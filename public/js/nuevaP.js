/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 2);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/nuevaP.js":
/*!********************************!*\
  !*** ./resources/js/nuevaP.js ***!
  \********************************/
/*! no static exports found */
/***/ (function(module, exports) {

/*

 Quill de nueva publicacion

 */
var toolbarOptions = [[{
  'size': ['small', false, 'large', 'huge']
}], // custom dropdown
[{
  'header': [1, 2, 3, 4, 5, 6, false]
}], [{
  'font': []
}], ['bold', 'italic', 'underline', 'strike'], // toggled buttons
['blockquote', 'code-block'], [{
  'header': 1
}, {
  'header': 2
}], // custom button values
[{
  'list': 'ordered'
}, {
  'list': 'bullet'
}], //[{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
[{
  'color': []
}, {
  'background': []
}], // dropdown with defaults from theme
[{
  'align': []
}]];
var toolbarOptionsPub = [[{
  'size': ['small', false, 'large', 'huge']
}], // custom dropdown
[{
  'header': [1, 2, 3, 4, 5, 6, false]
}], [{
  'font': []
}], ['bold', 'italic', 'underline', 'strike'], // toggled buttons
['blockquote', 'code-block'], [{
  'header': 1
}, {
  'header': 2
}], // custom button values
[{
  'list': 'ordered'
}, {
  'list': 'bullet'
}], //[{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
[{
  'color': []
}, {
  'background': []
}], // dropdown with defaults from theme
[{
  'align': []
}], ['image'
/*, 'video'*/
]];
var options = {
  placeholder: 'Coloca el titulo de la publicacion.',
  readOnly: false,
  theme: 'snow',
  modules: {
    toolbar: toolbarOptions
  }
};
var optionsPub = {
  placeholder: 'Coloca el contenido de la publicacion.',
  readOnly: false,
  theme: 'snow',
  modules: {
    toolbar: toolbarOptionsPub
  }
};
var titulo = new Quill('#titulo', options);
var publicacion = new Quill('#publicacion', optionsPub);
var btnPublicar = document.getElementById("publicar");

btnPublicar.onclick = function () {
  titulobd = titulo.getContents();
  otrotitulo = titulo.getText();
  publicacionbd = publicacion.getContents();

  if (titulobd.ops[0].insert !== "\n" && publicacionbd.ops[0].insert !== "\n") {
    document.getElementById('dataT').value = JSON.stringify(titulobd);
    document.getElementById('dataPub').value = JSON.stringify(publicacionbd);
    document.getElementById('tituloSN').value = otrotitulo;
    document.NuevaPublicacion.submit();
  } else {
    document.getElementById('notificacion').style.display = "block";
    window.scroll(0, 0);
  }
};

function cerrarNotificacion() {
  document.getElementById('notificacion').style.display = "none";
}

/***/ }),

/***/ 2:
/*!**************************************!*\
  !*** multi ./resources/js/nuevaP.js ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! D:\Proyectos\Laravel\developerObedNoe22\resources\js\nuevaP.js */"./resources/js/nuevaP.js");


/***/ })

/******/ });