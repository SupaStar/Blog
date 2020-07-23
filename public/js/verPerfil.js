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
/******/ 	return __webpack_require__(__webpack_require__.s = 3);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/verPerfil.js":
/*!***********************************!*\
  !*** ./resources/js/verPerfil.js ***!
  \***********************************/
/*! no static exports found */
/***/ (function(module, exports) {

var urlM = $("#urlRM").val();
var idU = $("#idU").val();
var tabla = "";
urlM += "/" + idU;

function botones() {
  $('.is-danger').click(function () {
    $("#eliminar").addClass('is-active');
    var token = $("meta[name='csrf-token']").attr("content");
    var idP = $(this).attr('id');
    var urlPD = $("#urlPD").val();
    urlPD += "/" + idP;
    params = {
      "id": idP,
      "_token": token
    };
    $.ajax({
      type: "delete",
      url: urlPD,
      data: params,
      success: function success() {
        $("#eliminar").removeClass('is-active');
        mostrar();
      }
    });
  });
}

function mostrar() {
  $("#loader").addClass('is-active');
  var urlVer = $("#urlVer").val();
  $.ajax({
    type: "get",
    url: urlM,
    success: function success(response) {
      if (tabla !== "") {
        tabla.destroy();
      }

      var json = JSON.parse(response);
      var publicaciones = json.publicaciones;
      $("#contenido").html("");
      publicaciones.forEach(function (data) {
        if (data.descripcion !== null) {
          $("#contenido").append("<tr><td>" + data.tituloSNFormato + "</td><td>" + data.descripcion + "</td>" + "<td><button type='button' aria-label='Eliminar.' id='" + data.id + "' class='button is-danger is-light is-small is-outlined'>" + "<i class='fas fa-trash-alt'></i></button>" + "<a href='" + urlVer + "/" + data.id + "' aria-label='Editar.' target='_blank' type='button' id='" + data.id + "' class='button is-info is-light is-small is-outlined'>" + "<i class='fas fa-eye'></i></a></td></tr>");
        } else {
          $("#contenido").append("<tr><td>" + data.tituloSNFormato + "</td><td>Sin Descripcion.</td>" + "<td><button type='button' aria-label='Eliminar.' id='" + data.id + "' class='button is-danger is-light is-small is-outlined'>" + "<i class='fas fa-trash-alt'></i></button>" + "<a href='" + urlVer + "/" + data.id + "' aria-label='Editar.' target='_blank' type='button' id='" + data.id + "' class='button is-info is-light is-small is-outlined'>" + "<i class='fas fa-eye'></i></a></td></tr>");
        }
      });
      tabla = $('#tabla').DataTable({
        "language": {
          "search": "Buscar:",
          "lengthMenu": "Mostrar _MENU_ registros por pagina",
          "info": "Pagina _PAGE_ de _PAGES_",
          "zeroRecords": "Aun no realizas ninguna publicacion."
        }
      });
      botones();
      $("#loader").removeClass('is-active');
    }
  });
}

mostrar();

/***/ }),

/***/ 3:
/*!*****************************************!*\
  !*** multi ./resources/js/verPerfil.js ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! D:\Proyectos\Laravel\developerObedNoe22\resources\js\verPerfil.js */"./resources/js/verPerfil.js");


/***/ })

/******/ });