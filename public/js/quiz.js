/*
 * ATTENTION: An "eval-source-map" devtool has been used.
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file with attached SourceMaps in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/quiz.js":
/*!******************************!*\
  !*** ./resources/js/quiz.js ***!
  \******************************/
/***/ (() => {

eval("$(function () {\n  $('input.chosen-answer').click(function (event) {\n    event.preventDefault();\n    $.ajax({\n      method: \"POST\",\n      url: QUIZ_DATA.sendAnswer + \"play/\" + $(this).data('id') + '/' + $(this).attr(\"value\")\n    }).done(function (response) {\n      $('div#quiz-wrapper').empty();\n      var html = '<div className=\"d-flex justify-content-center row\">' + '<div className=\"col-md-10 col-lg-10\">' + '<div className=\"border\">' + '<div className=\"question bg-white p-4 border-bottom\">' + '       <div className=\"d-flex flex-row align-items-center question-title\">' + '            <h5 className=\"mt-1 ml-2\">Słowo: ' + response.data.englishName + '</h5>' + '        </div> ' + '        <input type=\"radio\" className=\"chosen-answer\" id=\"wronganswera\" name=\"wronganswera\"' + '               data-id=\"' + response.data.id + '\" value=\"' + getChecked(response.data.wrongAnswerA, response.checked) + ' disabled>' + '            <label htmlFor=\"wronganswera\">' + response.data.wrongAnswerA + '</label><br>' + '            <input type=\"radio\" className=\"chosen-answer\" id=\"wronganswerb\" name=\"wronganswera\"' + '                   data-id=\"' + response.data.id + '\" value=\"' + getChecked(response.data.wrongAnswerB, response.checked) + ' disabled>' + '                <label htmlFor=\"wronganswerb\">' + response.data.wrongAnswerB + '</label><br>' + '                <input type=\"radio\" className=\"chosen-answer\" id=\"wronganswerc\" name=\"wronganswera\"' + '                       data-id=\"' + response.data.id + '\" value=\"' + getChecked(response.data.wrongAnswerC, response.checked) + ' disabled>' + '                    <label htmlFor=\"wronganswerc\">' + response.data.wrongAnswerC + '</label>' + getText(response) + '    </div></div></div></div>';\n      $('div#quiz-wrapper').append(html);\n    }).fail(function () {\n      Swal.fire('Ooops...', \"Wystąpił błąd\", 'error');\n    });\n  });\n\n  function getText(response) {\n    if (response.status == 'correct') return '<br><br><button class=\"btn btn-primary border-success align-items-center btn-success\" type=\"button\">Poprawna odpowiedź!';else if (response.status == 'wrong') return '<br><br><button class=\"btn btn-primary border-success align-items-center btn-danger\" type=\"button\">Zła odpowiedź!';\n  }\n\n  function getChecked(response, checked) {\n    if (response == checked) return response + '\" checked';else return response + '\"';\n  }\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvcXVpei5qcz9jODM3Il0sIm5hbWVzIjpbIiQiLCJjbGljayIsImV2ZW50IiwicHJldmVudERlZmF1bHQiLCJhamF4IiwibWV0aG9kIiwidXJsIiwiUVVJWl9EQVRBIiwic2VuZEFuc3dlciIsImRhdGEiLCJhdHRyIiwiZG9uZSIsInJlc3BvbnNlIiwiZW1wdHkiLCJodG1sIiwiZW5nbGlzaE5hbWUiLCJpZCIsImdldENoZWNrZWQiLCJ3cm9uZ0Fuc3dlckEiLCJjaGVja2VkIiwid3JvbmdBbnN3ZXJCIiwid3JvbmdBbnN3ZXJDIiwiZ2V0VGV4dCIsImFwcGVuZCIsImZhaWwiLCJTd2FsIiwiZmlyZSIsInN0YXR1cyJdLCJtYXBwaW5ncyI6IkFBQUFBLENBQUMsQ0FBQyxZQUFXO0FBRVRBLEVBQUFBLENBQUMsQ0FBQyxxQkFBRCxDQUFELENBQXlCQyxLQUF6QixDQUErQixVQUFTQyxLQUFULEVBQWdCO0FBQzVDQSxJQUFBQSxLQUFLLENBQUNDLGNBQU47QUFFQ0gsSUFBQUEsQ0FBQyxDQUFDSSxJQUFGLENBQU87QUFDSkMsTUFBQUEsTUFBTSxFQUFFLE1BREo7QUFFSkMsTUFBQUEsR0FBRyxFQUFFQyxTQUFTLENBQUNDLFVBQVYsR0FBdUIsT0FBdkIsR0FBaUNSLENBQUMsQ0FBQyxJQUFELENBQUQsQ0FBUVMsSUFBUixDQUFhLElBQWIsQ0FBakMsR0FBc0QsR0FBdEQsR0FBNERULENBQUMsQ0FBQyxJQUFELENBQUQsQ0FBUVUsSUFBUixDQUFhLE9BQWI7QUFGN0QsS0FBUCxFQUtDQyxJQUxELENBS00sVUFBVUMsUUFBVixFQUFvQjtBQUN0QlosTUFBQUEsQ0FBQyxDQUFDLGtCQUFELENBQUQsQ0FBc0JhLEtBQXRCO0FBQ0ksVUFBTUMsSUFBSSxHQUFHLHdEQUNULHVDQURTLEdBRUwsMEJBRkssR0FHYix1REFIYSxHQUliLDRFQUphLEdBS2IsK0NBTGEsR0FLcUNGLFFBQVEsQ0FBQ0gsSUFBVCxDQUFjTSxXQUxuRCxHQUtpRSxPQUxqRSxHQU1iLGlCQU5hLEdBUWIsNkZBUmEsR0FTYiwwQkFUYSxHQVNnQkgsUUFBUSxDQUFDSCxJQUFULENBQWNPLEVBVDlCLEdBU21DLFdBVG5DLEdBU2lEQyxVQUFVLENBQUNMLFFBQVEsQ0FBQ0gsSUFBVCxDQUFjUyxZQUFmLEVBQTZCTixRQUFRLENBQUNPLE9BQXRDLENBVDNELEdBUzJHLFlBVDNHLEdBVWIsNENBVmEsR0FVa0NQLFFBQVEsQ0FBQ0gsSUFBVCxDQUFjUyxZQVZoRCxHQVU4RCxjQVY5RCxHQVliLGlHQVphLEdBYWIsOEJBYmEsR0Fhb0JOLFFBQVEsQ0FBQ0gsSUFBVCxDQUFjTyxFQWJsQyxHQWF1QyxXQWJ2QyxHQWFxREMsVUFBVSxDQUFDTCxRQUFRLENBQUNILElBQVQsQ0FBY1csWUFBZixFQUE2QlIsUUFBUSxDQUFDTyxPQUF0QyxDQWIvRCxHQWErRyxZQWIvRyxHQWNiLGdEQWRhLEdBY3NDUCxRQUFRLENBQUNILElBQVQsQ0FBY1csWUFkcEQsR0Fja0UsY0FkbEUsR0FnQmIscUdBaEJhLEdBaUJiLGtDQWpCYSxHQWlCd0JSLFFBQVEsQ0FBQ0gsSUFBVCxDQUFjTyxFQWpCdEMsR0FpQjJDLFdBakIzQyxHQWlCeURDLFVBQVUsQ0FBQ0wsUUFBUSxDQUFDSCxJQUFULENBQWNZLFlBQWYsRUFBNkJULFFBQVEsQ0FBQ08sT0FBdEMsQ0FqQm5FLEdBaUJtSCxZQWpCbkgsR0FrQmIsb0RBbEJhLEdBa0IwQ1AsUUFBUSxDQUFDSCxJQUFULENBQWNZLFlBbEJ4RCxHQWtCc0UsVUFsQnRFLEdBbUJXQyxPQUFPLENBQUNWLFFBQUQsQ0FuQmxCLEdBb0JiLDhCQXBCQTtBQXFCQVosTUFBQUEsQ0FBQyxDQUFDLGtCQUFELENBQUQsQ0FBc0J1QixNQUF0QixDQUE2QlQsSUFBN0I7QUFDUCxLQTdCRCxFQStCQ1UsSUEvQkQsQ0ErQk0sWUFBWTtBQUNkQyxNQUFBQSxJQUFJLENBQUNDLElBQUwsQ0FBVSxVQUFWLEVBQXNCLGVBQXRCLEVBQXVDLE9BQXZDO0FBQ0gsS0FqQ0Q7QUFrQ0gsR0FyQ0Q7O0FBdUNBLFdBQVNKLE9BQVQsQ0FBaUJWLFFBQWpCLEVBQ0E7QUFDSSxRQUFHQSxRQUFRLENBQUNlLE1BQVQsSUFBbUIsU0FBdEIsRUFDSSxPQUFPLHlIQUFQLENBREosS0FFSyxJQUFHZixRQUFRLENBQUNlLE1BQVQsSUFBbUIsT0FBdEIsRUFDRCxPQUFPLG1IQUFQO0FBQ1A7O0FBRUQsV0FBU1YsVUFBVCxDQUFvQkwsUUFBcEIsRUFBOEJPLE9BQTlCLEVBQ0E7QUFDSSxRQUFHUCxRQUFRLElBQUlPLE9BQWYsRUFDSSxPQUFPUCxRQUFRLEdBQUcsV0FBbEIsQ0FESixLQUdJLE9BQU9BLFFBQVEsR0FBRyxHQUFsQjtBQUNQO0FBQ0osQ0F4REEsQ0FBRCIsInNvdXJjZXNDb250ZW50IjpbIiQoZnVuY3Rpb24oKSB7XG5cbiAgICAkKCdpbnB1dC5jaG9zZW4tYW5zd2VyJykuY2xpY2soZnVuY3Rpb24oZXZlbnQpIHtcbiAgICAgICBldmVudC5wcmV2ZW50RGVmYXVsdCgpO1xuXG4gICAgICAgICQuYWpheCh7XG4gICAgICAgICAgIG1ldGhvZDogXCJQT1NUXCIsXG4gICAgICAgICAgIHVybDogUVVJWl9EQVRBLnNlbmRBbnN3ZXIgKyBcInBsYXkvXCIgKyAkKHRoaXMpLmRhdGEoJ2lkJykgKyAnLycgKyAkKHRoaXMpLmF0dHIoXCJ2YWx1ZVwiKVxuICAgICAgICB9KVxuXG4gICAgICAgIC5kb25lKGZ1bmN0aW9uIChyZXNwb25zZSkge1xuICAgICAgICAgICAgJCgnZGl2I3F1aXotd3JhcHBlcicpLmVtcHR5KCk7XG4gICAgICAgICAgICAgICAgY29uc3QgaHRtbCA9ICc8ZGl2IGNsYXNzTmFtZT1cImQtZmxleCBqdXN0aWZ5LWNvbnRlbnQtY2VudGVyIHJvd1wiPicrXG4gICAgICAgICAgICAgICAgICAgICc8ZGl2IGNsYXNzTmFtZT1cImNvbC1tZC0xMCBjb2wtbGctMTBcIj4nK1xuICAgICAgICAgICAgICAgICAgICAgICAgJzxkaXYgY2xhc3NOYW1lPVwiYm9yZGVyXCI+JytcbiAgICAgICAgICAgICAgICAnPGRpdiBjbGFzc05hbWU9XCJxdWVzdGlvbiBiZy13aGl0ZSBwLTQgYm9yZGVyLWJvdHRvbVwiPicgK1xuICAgICAgICAgICAgICAgICcgICAgICAgPGRpdiBjbGFzc05hbWU9XCJkLWZsZXggZmxleC1yb3cgYWxpZ24taXRlbXMtY2VudGVyIHF1ZXN0aW9uLXRpdGxlXCI+JyArXG4gICAgICAgICAgICAgICAgJyAgICAgICAgICAgIDxoNSBjbGFzc05hbWU9XCJtdC0xIG1sLTJcIj5TxYJvd286ICcgKyByZXNwb25zZS5kYXRhLmVuZ2xpc2hOYW1lICsgJzwvaDU+JyArXG4gICAgICAgICAgICAgICAgJyAgICAgICAgPC9kaXY+ICcgK1xuXG4gICAgICAgICAgICAgICAgJyAgICAgICAgPGlucHV0IHR5cGU9XCJyYWRpb1wiIGNsYXNzTmFtZT1cImNob3Nlbi1hbnN3ZXJcIiBpZD1cIndyb25nYW5zd2VyYVwiIG5hbWU9XCJ3cm9uZ2Fuc3dlcmFcIicgK1xuICAgICAgICAgICAgICAgICcgICAgICAgICAgICAgICBkYXRhLWlkPVwiJyArIHJlc3BvbnNlLmRhdGEuaWQgKyAnXCIgdmFsdWU9XCInICsgZ2V0Q2hlY2tlZChyZXNwb25zZS5kYXRhLndyb25nQW5zd2VyQSwgcmVzcG9uc2UuY2hlY2tlZCkgKycgZGlzYWJsZWQ+JyArXG4gICAgICAgICAgICAgICAgJyAgICAgICAgICAgIDxsYWJlbCBodG1sRm9yPVwid3JvbmdhbnN3ZXJhXCI+JyArIHJlc3BvbnNlLmRhdGEud3JvbmdBbnN3ZXJBICsnPC9sYWJlbD48YnI+JyArXG5cbiAgICAgICAgICAgICAgICAnICAgICAgICAgICAgPGlucHV0IHR5cGU9XCJyYWRpb1wiIGNsYXNzTmFtZT1cImNob3Nlbi1hbnN3ZXJcIiBpZD1cIndyb25nYW5zd2VyYlwiIG5hbWU9XCJ3cm9uZ2Fuc3dlcmFcIicrXG4gICAgICAgICAgICAgICAgJyAgICAgICAgICAgICAgICAgICBkYXRhLWlkPVwiJyArIHJlc3BvbnNlLmRhdGEuaWQgKyAnXCIgdmFsdWU9XCInICsgZ2V0Q2hlY2tlZChyZXNwb25zZS5kYXRhLndyb25nQW5zd2VyQiwgcmVzcG9uc2UuY2hlY2tlZCkgKycgZGlzYWJsZWQ+JyArXG4gICAgICAgICAgICAgICAgJyAgICAgICAgICAgICAgICA8bGFiZWwgaHRtbEZvcj1cIndyb25nYW5zd2VyYlwiPicgKyByZXNwb25zZS5kYXRhLndyb25nQW5zd2VyQiArJzwvbGFiZWw+PGJyPicgK1xuXG4gICAgICAgICAgICAgICAgJyAgICAgICAgICAgICAgICA8aW5wdXQgdHlwZT1cInJhZGlvXCIgY2xhc3NOYW1lPVwiY2hvc2VuLWFuc3dlclwiIGlkPVwid3JvbmdhbnN3ZXJjXCIgbmFtZT1cIndyb25nYW5zd2VyYVwiJyArXG4gICAgICAgICAgICAgICAgJyAgICAgICAgICAgICAgICAgICAgICAgZGF0YS1pZD1cIicgKyByZXNwb25zZS5kYXRhLmlkICsgJ1wiIHZhbHVlPVwiJyArIGdldENoZWNrZWQocmVzcG9uc2UuZGF0YS53cm9uZ0Fuc3dlckMsIHJlc3BvbnNlLmNoZWNrZWQpICsnIGRpc2FibGVkPicgK1xuICAgICAgICAgICAgICAgICcgICAgICAgICAgICAgICAgICAgIDxsYWJlbCBodG1sRm9yPVwid3JvbmdhbnN3ZXJjXCI+JyArIHJlc3BvbnNlLmRhdGEud3JvbmdBbnN3ZXJDICsnPC9sYWJlbD4nICtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBnZXRUZXh0KHJlc3BvbnNlKSArXG4gICAgICAgICAgICAgICAgJyAgICA8L2Rpdj48L2Rpdj48L2Rpdj48L2Rpdj4nO1xuICAgICAgICAgICAgICAgICQoJ2RpdiNxdWl6LXdyYXBwZXInKS5hcHBlbmQoaHRtbCk7XG4gICAgICAgIH0pXG5cbiAgICAgICAgLmZhaWwoZnVuY3Rpb24gKCkge1xuICAgICAgICAgICAgU3dhbC5maXJlKCdPb29wcy4uLicsIFwiV3lzdMSFcGnFgiBixYLEhWRcIiwgJ2Vycm9yJyk7XG4gICAgICAgIH0pXG4gICAgfSk7XG5cbiAgICBmdW5jdGlvbiBnZXRUZXh0KHJlc3BvbnNlKVxuICAgIHtcbiAgICAgICAgaWYocmVzcG9uc2Uuc3RhdHVzID09ICdjb3JyZWN0JylcbiAgICAgICAgICAgIHJldHVybiAnPGJyPjxicj48YnV0dG9uIGNsYXNzPVwiYnRuIGJ0bi1wcmltYXJ5IGJvcmRlci1zdWNjZXNzIGFsaWduLWl0ZW1zLWNlbnRlciBidG4tc3VjY2Vzc1wiIHR5cGU9XCJidXR0b25cIj5Qb3ByYXduYSBvZHBvd2llZMW6ISc7XG4gICAgICAgIGVsc2UgaWYocmVzcG9uc2Uuc3RhdHVzID09ICd3cm9uZycpXG4gICAgICAgICAgICByZXR1cm4gJzxicj48YnI+PGJ1dHRvbiBjbGFzcz1cImJ0biBidG4tcHJpbWFyeSBib3JkZXItc3VjY2VzcyBhbGlnbi1pdGVtcy1jZW50ZXIgYnRuLWRhbmdlclwiIHR5cGU9XCJidXR0b25cIj5axYJhIG9kcG93aWVkxbohJztcbiAgICB9XG5cbiAgICBmdW5jdGlvbiBnZXRDaGVja2VkKHJlc3BvbnNlLCBjaGVja2VkKVxuICAgIHtcbiAgICAgICAgaWYocmVzcG9uc2UgPT0gY2hlY2tlZClcbiAgICAgICAgICAgIHJldHVybiByZXNwb25zZSArICdcIiBjaGVja2VkJztcbiAgICAgICAgZWxzZVxuICAgICAgICAgICAgcmV0dXJuIHJlc3BvbnNlICsgJ1wiJztcbiAgICB9XG59KTtcbiJdLCJmaWxlIjoiLi9yZXNvdXJjZXMvanMvcXVpei5qcy5qcyIsInNvdXJjZVJvb3QiOiIifQ==\n//# sourceURL=webpack-internal:///./resources/js/quiz.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/js/quiz.js"]();
/******/ 	
/******/ })()
;