(function () {

    var LocalStorage = {
        name: 'localStorage',
        init: function () {
            if (!window.localStorage) {
                return false;
            }
            this._storage = window.localStorage;
            return this;
        },
        setStorage: function (key, value) {
            this._storage.setItem(key, value);
            return true;
        },
        getStorage: function (key, callback) {
            var item = this._storage.getItem(key);
            var value = item ? item : null;
            callback(value);
        },
        removeStorage: function (key) {
            this._storage.removeItem(key);
            return true;
        },
        clearStorage: function () {
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
        init: function () {
            if (!Browser.firefox || !window.globalStorage) {
                return false;
            }
            this._storage = globalStorage[location.hostname];
            return this;
        },
        setStorage: function (key, value) {
            this._storage.setItem(key, value);
            return true;
        },
        getStorage: function (key, callback) {
            var item = this._storage.getItem(key);
            var value = item ? item.value : null;
            callback(value);
        },
        removeStorage: function (key) {
            this._storage.removeItem(key);
            return true;
        },
        clearStorage: function () {
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
        name: 'userdata',
        init: function () {
            this.Master = "ie6+";
            if (!Browser.ie)
                return false;
            this.file_name = 'ViewState';
            if (!this._storage) {
                try {
                    var o = this._storage = document.createElement('input');
                    o.type = 'hidden';
                    o.addBehavior('#default#userData');
                    document.body.appendChild(o);
                    o.save(this.file_name);
                } catch (e) {
                }
            }
            return this;
        },
        setStorage: function (key, value) {
            this._storage.setAttribute(key, value);
            this._storage.save(this.file_name);
            return true;
        },
        getStorage: function (key, callback) {
            this._storage.load(this.file_name);
            callback(this._storage.getAttribute(key));
        },
        removeStorage: function (key) {
            this._storage.removeAttribute(key);
            this._storage.save(this.file_name);
            return true;
        },
        clearStorage: function () {
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
        init: function () {
            if (!window.openDatabase)
                return false;
            this._storage = window.openDatabase("ViewState", "1.0", "Web Browser Storage", 20000);

            this._createTable();
            return this;
        },
        setStorage: function (key, value) {
            this._storage.transaction(function (tx) {
                tx.executeSql("SELECT v FROM SessionStorage WHERE k = ?", [key], function (tx, result) {
                    if (result.rows.length) {
                        tx.executeSql("UPDATE SessionStorage SET v = ?  WHERE k = ?", [value, key]);
                    } else {
                        tx.executeSql("INSERT INTO SessionStorage (k, v) VALUES (?, ?)", [key, value]);
                    }
                });
            });
            return true;
        },
        getStorage: function (key, callback) {
            this._storage.transaction(function (tx) {
                v = tx.executeSql("SELECT v FROM SessionStorage WHERE k = ?", [key], function (tx, result) {
                    if (result.rows.length)
                        return callback(result.rows.item(0).v);
                    callback(null);
                });
            });
        },
        removeStorage: function (key) {
            this._storage.transaction(function (tx) {
                tx.executeSql("DELETE FROM SessionStorage WHERE k = ?", [key]);
            });
            return true;
        },
        clearStorage: function () {
            this._storage.transaction(function (tx) {
                tx.executeSql("DROP TABLE SessionStorage", []);
            });
            return true;
        },
        _createTable: function () {
            this._storage.transaction(function (tx) {
                tx.executeSql("SELECT COUNT(*) FROM SessionStorage", [], function () {
                },
                        function (tx, error) {
                            tx.executeSql("CREATE TABLE SessionStorage (k TEXT, v TEXT)", [], function () {
                            });
                        });
            });
        }
    };

    var empty = {
        setStorage: function () {
        },
        getStorage: function () {
        },
        removeStorage: function () {
        },
        clearStorage: function () {
        }
    };

    BrowserStore = new Class({
        initialize: function () {
            this.storage = OpenDatabase.init() || GlobalStorage.init() || LocalStorage.init() || UserData.init() || empty;
            return this;
        },
        set: function (key, vl) {
            vl && typeOf(vl) === 'string' && this.storage.setStorage(key, vl);
            return this;
        },
        get: function (key, callback) {
            this.storage.getStorage(key, callback);
        },
        remove: function (key) {
            if (!key || !this.storage)
                return false;
            key && this.storage.removeStorage(key);
            return this;
        },
        clear: function () {
            if (!this.storage)
                return false;
            this.storage.clearStorage();
            return this;
        }
    });

})();
