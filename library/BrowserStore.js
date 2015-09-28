/**
 * BrowserStore.js
 * General browser local storage engine
 * Support localStorage, openDatabase, userData, sessionStorage, globalStorage and cookie
 *
 * @author Shocker Li
 * @link https://github.com/shockerli/BrowserStore.js
 */

(function() {

    BrowserStore = window.BrowserStore = {
        version: "1.0",
        /**
         * Initialize the BrowserStore
         *
         * @param {string} storageName
         * @returns {BrowserStore}
         */
        init: function(storageName) {
            if (!this.storage) {
                switch (storageName) {
                    case "localStorage":
                        this.storage = localStorage.init();
                        break;
                    case "openDatabase":
                        this.storage = openDatabase.init();
                        break;
                    case "userData":
                        this.storage = userData.init();
                        break;
                    case "globalStorage":
                        this.storage = globalStorage.init();
                        break;
                    case "sessionStorage":
                        this.storage = sessionStorage.init();
                        break;
                    case "cookie":
                        this.storage = cookie.init();
                        break;
                }

                if (!this.storage) {
                    this.storage = localStorage.init() || openDatabase.init() || userData.init() || globalStorage.init() || sessionStorage.init() || cookie.init() || emptyStorage.init();
                }
            }

            return this;
        },
        /**
         * Get the current storage name
         *
         * @returns {BrowserStore.storage.name}
         */
        getName: function() {
            return this.storage.name;
        },
        /**
         * Set value to storage
         *
         * @param {string} key
         * @param {mixed} val
         * @param {number} expires Expire time(unit: millisecond)
         * @returns {BrowserStore}
         */
        set: function(key, val, expires) {
            this.init();
            if (val === null) {
                this.storage.removeStorage(key);
                return this;
            }

            var data = {
                "key": key,
                "value": val
            };
            if (typeof expires === 'number' && expires > 0) {
                var date = new Date();
                var time = date.setTime(date.getTime() + expires);
                data.expireTime = time;
            }
            this.storage.setStorage(key, JSON.stringify(data));
            return this;
        },
        /**
         * Get value from the storage
         *
         * @param {string} key
         * @param {JSON@call} callback The available callback function
         * @returns {JSON@call;parse.value|Boolean}
         */
        get: function(key, callback) {
            this.init();
            if (!key || !this.storage) {
                return false;
            }

            var isCallback = (typeof callback === 'function') ? true : false;
            if (this.getName() === 'openDatabase' && !isCallback) {
                return false;
            }

            if (isCallback) {
                this.storage.getStorage(key, callback);
                return true;
            }

            var storeValue = this.storage.getStorage(key);
            if (!storeValue) {
                return false;
            }

            var data = JSON.parse(storeValue);
            if (data.expireTime) {
                var date = new Date();
                var now = date.setTime(date.getTime());
                if (now > data.expireTime) {
                    return false;
                }
            }
            return data.value;
        },
        /**
         * Remove the value from the storage
         *
         * @param {string} key
         * @returns {BrowserStore|Boolean}
         */
        remove: function(key) {
            this.init();
            if (!key || !this.storage) {
                return false;
            }
            key && this.storage.removeStorage(key);
            return this;
        },
        /**
         * Clear all values in the storage
         *
         * @returns {BrowserStore|Boolean}
         */
        clear: function() {
            this.init();
            if (!this.storage) {
                return false;
            }
            this.storage.clearStorage();
            return this;
        }
    };

    /**
     * emptyStorage
     *
     * @type object
     */
    var emptyStorage = {
        name: "emptyStorage",
        init: function() {},
        setStorage: function(key, value) {},
        getStorage: function(key, callback) {},
        removeStorage: function(key) {},
        clearStorage: function() {}
    };

    /**
     * localStorage
     *
     * @type object
     */
    var localStorage = {
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
        getStorage: function(key, callback) {
            var item = this._storage.getItem(key);
            if (callback) {
                callback(item);
            } else {
                return item;
            }
        },
        removeStorage: function(key) {
            this._storage.removeItem(key);
            return true;
        },
        clearStorage: function() {
            if (this._storage.clear) {
                this._storage.clear();
            } else {
                for (var key in this._storage) {
                    this.removeStorage(key);
                }
            }
            return true;
        }

    };

    /**
     * userData
     *
     * @type object
     */
    var userData = {
        name: 'userData',
        init: function() {
            if (!window.document.documentElement.addBehavior) {
                return false;
            }
            this.file_name = window.location.hostname;
            if (!this._storage) {
                try {
                    this._storage = document.createElement('input');
                    this._storage.type = 'hidden';
                    this._storage.style.display = 'none';
                    this._storage.addBehavior('#default#userData');
                    document.body.appendChild(this._storage);
                    var expires = new Date();
                    expires.setDate(expires.getDate() + 365);
                    this._storage.expires = expires.toUTCString();
                } catch (e) {
                    return false;
                }
            }
            return this;
        },
        setStorage: function(key, value) {
            this._storage.load(this.file_name);
            this._storage.setAttribute(key, value);
            this._storage.save(this.file_name);
            return true;
        },
        getStorage: function(key, callback) {
            this._storage.load(this.file_name);
            var item = this._storage.getAttribute(key);
            if (callback) {
                callback(item);
            } else {
                return item;
            }
        },
        removeStorage: function(key) {
            this._storage.load(this.file_name);
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

    /**
     * openDatabase
     *
     * @type object
     */
    var openDatabase = {
        name: 'openDatabase',
        init: function() {
            if (!window.openDatabase)
                return false;
            this._storage = window.openDatabase("viewState", "1.0", "Upfor ViewState Storage", 5 * 1024 * 1024);

            this._storage.transaction(function(tx) {
                tx.executeSql("CREATE TABLE IF NOT EXISTS `SessionStorage` (`sKey` TEXT PRIMARY KEY NOT NULL, `sVal` TEXT NOT NULL)", [], function() {});
            });

            return this;
        },
        setStorage: function(key, value) {
            this._storage.transaction(function(tx) {
                tx.executeSql("SELECT `sVal` FROM `SessionStorage` WHERE `sKey` = ?", [key], function(tx, result) {
                    if (result.rows.length) {
                        tx.executeSql("UPDATE `SessionStorage` SET `sVal` = ?  WHERE `sKey` = ?", [value, key]);
                    } else {
                        tx.executeSql("INSERT INTO `SessionStorage` (`sKey`, `sVal`) VALUES (?, ?)", [key, value]);
                    }
                });
            });
            return true;
        },
        getStorage: function(key, callback) {
            this._storage.transaction(function(tx) {
                tx.executeSql("SELECT `sVal` FROM `SessionStorage` WHERE `sKey` = ?", [key], function(tx, result) {
                    if (result.rows.length) {
                        callback(result.rows.item(0).sVal);
                    }
                    callback(null);
                });
            });
        },
        removeStorage: function(key) {
            this._storage.transaction(function(tx) {
                tx.executeSql("DELETE FROM `SessionStorage` WHERE `sKey` = ?", [key]);
            });
            return true;
        },
        clearStorage: function() {
            this._storage.transaction(function(tx) {
                tx.executeSql("DROP TABLE `SessionStorage`", []);
            });
            return true;
        }
    };

    /**
     * globalStorage
     *
     * @type object
     */
    var globalStorage = {
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
        getStorage: function(key, callback) {
            var item = this._storage.getItem(key);
            if (callback) {
                callback(item);
            } else {
                return item;
            }
        },
        removeStorage: function(key) {
            this._storage.removeItem(key);
            return true;
        },
        clearStorage: function() {
            if (this._storage.clear) {
                this._storage.clear();
            } else {
                for (var key in this._storage) {
                    this.removeStorage(key);
                }
            }
            return true;
        }
    };

    /**
     * sessionStorage
     *
     * @type object
     */
    var sessionStorage = {
        name: "sessionStorage",
        init: function() {
            if (!window.sessionStorage) {
                return false;
            }
            this._storage = window.sessionStorage;
            return this;
        },
        setStorage: function(key, value) {
            this._storage.setItem(key, value);
            return true;
        },
        getStorage: function(key, callback) {
            var item = this._storage.getItem(key);
            if (callback) {
                callback(item);
            } else {
                return item;
            }
        },
        removeStorage: function(key) {
            this._storage.removeItem(key);
            return true;
        },
        clearStorage: function() {
            if (this._storage.clear) {
                this._storage.clear();
            } else {
                for (var key in this._storage) {
                    this.removeStorage(key);
                }
            }
            return true;
        }
    };

    /**
     * cookie
     *
     * @type object
     */
    var cookie = {
        name: "cookie",
        init: function() {
            return this;
        },
        setStorage: function(key, value) {
            if (!this.isValidKey(key)) {
                return;
            }

            var data = JSON.parse(value);
            var expire = new Date();
            if (typeof data.expireTime === 'number') {
                expire.setTime(data.expireTime);
            } else {
                expire.setTime(expire.getTime() + 86400000 * 7);
            }

            var config = {
                "path": "",
                "domain": "",
                "secure": ""
            };
            document.cookie = key + "=" + value + ("; path=" + (config.path ? (config.path === './' ? '' : config.path) : "/")) + (expire ? "; expires=" + expire.toGMTString() : "") + (config.domain ? "; domain=" + config.domain : "") + (config.secure ? "; secure" : '');
        },
        getStorage: function(key, callback) {
            if (this.isValidKey(key)) {
                var reg = new RegExp("(^| )" + key + "=([^;\/]*)([^;\x24]*)(;|\x24)");
                var result = reg.exec(document.cookie);
                if (result) {
                    if (callback) {
                        callback(result[2]);
                    } else {
                        return result[2];
                    }
                }
            }
            return false;
        },
        removeStorage: function(key) {
            var data = {
                "key": key,
                "value": null,
                "expireTime": -1
            };
            this.setStorage(key, JSON.stringify(data));
            return true;
        },
        clearStorage: function() {
            var keyArray = document.cookie.match(/[^ =;]+(?=\=)/g);
            for (var key in keyArray) {
                this.removeStorage(key);
            }
            return true;
        },
        isValidKey: function(key) {
            return (new RegExp("^[^\\x00-\\x20\\x7f\\(\\)<>@,;:\\\\\\\"\\[\\]\\?=\\{\\}\\/\\u0080-\\uffff]+\x24")).test(key);
        }
    };

})();