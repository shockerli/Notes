/**
 * BrowserStore.js
 * Support localStorage, globalStorage, openDatabase, userData
 *
 * @author Shocker Li
 * @link http://shockerli.net
 */

(function() {

    var LocalStorage = {
        name: 'localStorage',
        init: function() {
            if (!window.localStorage) {
                return false;
            }
            this._storage = window.localStorage;
            return this;
        },
        setStorage: function(key, value) {
            this._storage.setItem(key, value);
            return true;
        },
        getStorage: function(key) {
            var item = this._storage.getItem(key);
            return item ? item : null;
        },
        removeStorage: function(key) {
            this._storage.removeItem(key);
            return true;
        },
        clearStorage: function() {
            if (this._storage.clear) {
                this._storage.clear();
            } else {
                for (i in this._storage) {
                    if (this._storage[i].value) {
                        this.remove(i);
                    }
                }
            }
            return true;
        }

    };

    var GlobalStorage = {
        name: 'globalStorage',
        init: function() {
            if (!window.globalStorage) {
                return false;
            }
            this._storage = globalStorage[location.hostname];
            return this;
        },
        setStorage: function(key, value) {
            this._storage.setItem(key, value);
            return true;
        },
        getStorage: function(key) {
            var item = this._storage.getItem(key);
            return item ? item.value : null;
        },
        removeStorage: function(key) {
            this._storage.removeItem(key);
            return true;
        },
        clearStorage: function() {
            if (this._storage.clear) {
                this._storage.clear();
            } else {
                for (i in this._storage) {
                    if (this._storage[i].value) {
                        this.remove(i);
                    }
                }
            }
            return true;
        }
    };

    var UserData = {
        name: 'userData',
        init: function() {
            this.Master = "ie6+";
            if (!Browser.ie)
                return false;
            this.file_name = 'Upfor_UserData';
            if (!this._storage) {
                try {
                    var handle = this._storage = document.createElement('input');
                    handle.type = 'hidden';
                    handle.addBehavior('#default#userData');
                    document.body.appendChild(handle);
                    handle.save(this.file_name);
                } catch (e) {}
            }
            return this;
        },
        setStorage: function(key, value) {
            this._storage.setAttribute(key, value);
            this._storage.save(this.file_name);
            return true;
        },
        getStorage: function(key) {
            this._storage.load(this.file_name);
            return this._storage.getAttribute(key);
        },
        removeStorage: function(key) {
            this._storage.removeAttribute(key);
            this._storage.save(this.file_name);
            return true;
        },
        clearStorage: function() {
            this._storage.load(this.file_name);
            var date = new Date();
            date.setMinutes(date.getMinutes() - 1);
            this._storage.expires = date.toUTCString();
            this._storage.save(this.file_name);
            return true;
        }
    };

    var OpenDatabase = {
        name: 'openDatabase',
        init: function() {
            if (!window.openDatabase)
                return false;
            this._storage = window.openDatabase("viewState", "1.0", "Upfor ViewState Storage", 20000);

            this._createTable();
            return this;
        },
        setStorage: function(key, value) {
            this._storage.transaction(function(tx) {
                tx.executeSql("SELECT v FROM SessionStorage WHERE k = ?", [key], function(tx, result) {
                    if (result.rows.length) {
                        tx.executeSql("UPDATE SessionStorage SET v = ?  WHERE k = ?", [value, key]);
                    } else {
                        tx.executeSql("INSERT INTO SessionStorage (k, v) VALUES (?, ?)", [key, value]);
                    }
                });
            });
            return true;
        },
        getStorage: function(key) {
            this._storage.transaction(function(tx) {
                tx.executeSql("SELECT v FROM SessionStorage WHERE k = ?", [key], function(tx, result) {
                    if (result.rows.length) {
                        return result.rows.item(0).v;
                    }
                    return null;
                });
            });
        },
        removeStorage: function(key) {
            this._storage.transaction(function(tx) {
                tx.executeSql("DELETE FROM SessionStorage WHERE k = ?", [key]);
            });
            return true;
        },
        clearStorage: function() {
            this._storage.transaction(function(tx) {
                tx.executeSql("DROP TABLE SessionStorage", []);
            });
            return true;
        },
        _createTable: function() {
            this._storage.transaction(function(tx) {
                tx.executeSql("SELECT COUNT(*) FROM SessionStorage", [], function() {}, function(tx, error) {
                    tx.executeSql("CREATE TABLE SessionStorage (k TEXT, v TEXT)", [], function() {});
                });
            });
        }
    };

    var empty = {
        setStorage: function() {},
        getStorage: function() {},
        removeStorage: function() {},
        clearStorage: function() {}
    };

    BrowserStore = {
        init: function() {
            if (!this.storage) {
                this.storage = LocalStorage.init() || GlobalStorage.init() || OpenDatabase.init() || UserData.init() || empty;
            }
            
            return this;
        },
        //支持设置有效期（单位：毫秒）
        set: function(key, val, expires) {
            this.init();
            //值为null，则表示删除
            if (val === null) {
                this.storage.removeStorage(key);
                return this;
            }

            var data = {
                "key": key,
                "value": val
            };
            //加入有效期
            if (typeof expires === 'number' && expires > 0) {
                var date = new Date();
                var time = date.setTime(date.getTime() + expires);
                data.expireTime = time;
            }
            this.storage.setStorage(key, JSON.stringify(data));
            return this;
        },
        get: function(key) {
            this.init();
            if (!key || !this.storage) {
                return false;
            }
            var value = this.storage.getStorage(key);
            if (!value) {
                return false;
            }

            //有效期判断
            var data = JSON.parse(value);
            if (data.expireTime) {
                var date = new Date();
                var now = date.setTime(date.getTime());
                if (now > data.expireTime) {
                    return false;
                }
            }
            return data.value;
        },
        remove: function(key) {
            this.init();
            if (!key || !this.storage) {
                return false;
            }
            key && this.storage.removeStorage(key);
            return this;
        },
        clear: function() {
            this.init();
            if (!this.storage) {
                return false;
            }
            this.storage.clearStorage();
            return this;
        }
    };

})();