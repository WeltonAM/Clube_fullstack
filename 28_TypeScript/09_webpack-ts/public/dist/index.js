/*
 * ATTENTION: The "eval" devtool has been used (maybe by default in mode: "development").
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./src/classes/Person.ts":
/*!*******************************!*\
  !*** ./src/classes/Person.ts ***!
  \*******************************/
/***/ ((__unused_webpack_module, exports) => {

eval("\r\nObject.defineProperty(exports, \"__esModule\", ({ value: true }));\r\nexports.Person = void 0;\r\nclass Person {\r\n    static test() {\r\n        console.log('test');\r\n    }\r\n    ;\r\n    set myName(myName) {\r\n        this._myName = myName;\r\n    }\r\n    get myName() {\r\n        return this._myName;\r\n    }\r\n    constructor(name, age) {\r\n        this.name = name;\r\n        this.age = age;\r\n        this._myName = '';\r\n    }\r\n    ;\r\n    info() {\r\n        return `My name is ${this.name} ${this._myName} and I'm ${this.age} years old`;\r\n    }\r\n}\r\nexports.Person = Person;\r\n\n\n//# sourceURL=webpack://09_webpack-ts/./src/classes/Person.ts?");

/***/ }),

/***/ "./src/index.ts":
/*!**********************!*\
  !*** ./src/index.ts ***!
  \**********************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {

eval("\r\nObject.defineProperty(exports, \"__esModule\", ({ value: true }));\r\nconst Person_1 = __webpack_require__(/*! ./classes/Person */ \"./src/classes/Person.ts\");\r\nconst person = new Person_1.Person(\"Juliana\", 27);\r\nperson.myName = 'Karla';\r\nconsole.log(person.info());\r\n\n\n//# sourceURL=webpack://09_webpack-ts/./src/index.ts?");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval devtool is used.
/******/ 	var __webpack_exports__ = __webpack_require__("./src/index.ts");
/******/ 	
/******/ })()
;