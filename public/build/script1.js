(self["webpackChunk"] = self["webpackChunk"] || []).push([["script1"],{

/***/ "./assets/javascript/script1.js":
/*!**************************************!*\
  !*** ./assets/javascript/script1.js ***!
  \**************************************/
/***/ (() => {

/************************************************************************* */
var hidePasswd = document.getElementById("eye__hide");
hidePasswd.addEventListener("click", hidePassword);
var hidePasswdMobile = document.getElementById("eye__hide__mobile");
hidePasswdMobile.addEventListener("click", hidePassword); //Showing/hiding password

function hidePassword() {
  var passwordField = document.getElementById("password__field");
  var passwordFieldMobile = document.getElementById("password__field__mobile");

  if (passwordField.type == 'password') {
    passwordField.type = 'text';
  } else {
    passwordField.type = 'password';
  }
}
/************************************************************************* */

/***/ })

},
/******/ __webpack_require__ => { // webpackRuntimeModules
/******/ var __webpack_exec__ = (moduleId) => (__webpack_require__(__webpack_require__.s = moduleId))
/******/ var __webpack_exports__ = (__webpack_exec__("./assets/javascript/script1.js"));
/******/ }
]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoic2NyaXB0MS5qcyIsIm1hcHBpbmdzIjoiOzs7Ozs7OztBQUFBO0FBQ0EsSUFBTUEsVUFBVSxHQUFHQyxRQUFRLENBQUNDLGNBQVQsQ0FBd0IsV0FBeEIsQ0FBbkI7QUFDQUYsVUFBVSxDQUFDRyxnQkFBWCxDQUE0QixPQUE1QixFQUFxQ0MsWUFBckM7QUFDQSxJQUFNQyxnQkFBZ0IsR0FBR0osUUFBUSxDQUFDQyxjQUFULENBQXdCLG1CQUF4QixDQUF6QjtBQUNBRyxnQkFBZ0IsQ0FBQ0YsZ0JBQWpCLENBQWtDLE9BQWxDLEVBQTJDQyxZQUEzQyxHQUNBOztBQUNBLFNBQVNBLFlBQVQsR0FBdUI7RUFDbkIsSUFBTUUsYUFBYSxHQUFHTCxRQUFRLENBQUNDLGNBQVQsQ0FBd0IsaUJBQXhCLENBQXRCO0VBQ0EsSUFBTUssbUJBQW1CLEdBQUdOLFFBQVEsQ0FBQ0MsY0FBVCxDQUF3Qix5QkFBeEIsQ0FBNUI7O0VBQ0EsSUFBSUksYUFBYSxDQUFDRSxJQUFkLElBQXNCLFVBQTFCLEVBQ0k7SUFDSUYsYUFBYSxDQUFDRSxJQUFkLEdBQXFCLE1BQXJCO0VBQ0gsQ0FITCxNQUtBO0lBQ0lGLGFBQWEsQ0FBQ0UsSUFBZCxHQUFxQixVQUFyQjtFQUNIO0FBQ0o7QUFFRCIsInNvdXJjZXMiOlsid2VicGFjazovLy8uL2Fzc2V0cy9qYXZhc2NyaXB0L3NjcmlwdDEuanMiXSwic291cmNlc0NvbnRlbnQiOlsiLyoqKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqKiogKi9cbmNvbnN0IGhpZGVQYXNzd2QgPSBkb2N1bWVudC5nZXRFbGVtZW50QnlJZChcImV5ZV9faGlkZVwiKTtcbmhpZGVQYXNzd2QuYWRkRXZlbnRMaXN0ZW5lcihcImNsaWNrXCIsIGhpZGVQYXNzd29yZCk7XG5jb25zdCBoaWRlUGFzc3dkTW9iaWxlID0gZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoXCJleWVfX2hpZGVfX21vYmlsZVwiKTtcbmhpZGVQYXNzd2RNb2JpbGUuYWRkRXZlbnRMaXN0ZW5lcihcImNsaWNrXCIsIGhpZGVQYXNzd29yZCk7XG4vL1Nob3dpbmcvaGlkaW5nIHBhc3N3b3JkXG5mdW5jdGlvbiBoaWRlUGFzc3dvcmQoKXtcbiAgICBjb25zdCBwYXNzd29yZEZpZWxkID0gZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoXCJwYXNzd29yZF9fZmllbGRcIik7XG4gICAgY29uc3QgcGFzc3dvcmRGaWVsZE1vYmlsZSA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKFwicGFzc3dvcmRfX2ZpZWxkX19tb2JpbGVcIik7XG4gICAgaWYoKHBhc3N3b3JkRmllbGQudHlwZSA9PSAncGFzc3dvcmQnKSlcbiAgICAgICAge1xuICAgICAgICAgICAgcGFzc3dvcmRGaWVsZC50eXBlID0gJ3RleHQnO1xuICAgICAgICB9XG4gICAgZWxzZVxuICAgIHtcbiAgICAgICAgcGFzc3dvcmRGaWVsZC50eXBlID0gJ3Bhc3N3b3JkJztcbiAgICB9XG59XG5cbi8qKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqICovXG4iXSwibmFtZXMiOlsiaGlkZVBhc3N3ZCIsImRvY3VtZW50IiwiZ2V0RWxlbWVudEJ5SWQiLCJhZGRFdmVudExpc3RlbmVyIiwiaGlkZVBhc3N3b3JkIiwiaGlkZVBhc3N3ZE1vYmlsZSIsInBhc3N3b3JkRmllbGQiLCJwYXNzd29yZEZpZWxkTW9iaWxlIiwidHlwZSJdLCJzb3VyY2VSb290IjoiIn0=