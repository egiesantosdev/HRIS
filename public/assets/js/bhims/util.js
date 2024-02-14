/**
 * It's a wrapper for the jQuery AJAX function that allows you to pass in an object with the AJAX
 * parameters and it will return a promise.
 * </code>
 * @param ajaxObj - {
 *  method - The HTTP method,
 *  url - The API url,
 *  data - Object data,
 *  loader - If apply a loading overlay,
 *  successAlert - Success alert popup,
 *  warningAlert - Warning alert popup,
 *  success - Success callback function,
 *  error - Error callback function
 *  }
 * @returns The return value of the AJAX function is the return value of the $.ajax() function.
 */
async function AJAX(ajaxObj) {
  if (ajaxObj.hasOwnProperty("method")) {
    const method = ajaxObj.method.toUpperCase();
    let data = {};
    let response = null;
    let url = ajaxObj.url;
    if (ajaxObj.hasOwnProperty("data")) {
      data = ajaxObj.data;
      if (Array.isArray(data)) {
        if (data.length > 0) {
          data = {};
          $(ajaxObj.data).each(function (index, obj) {
            data[obj.name] = obj.value;
          });
        } else {
          data = {};
        }
      }
    }

    let has_loader = true;
    if (
      ajaxObj.hasOwnProperty("loader") &&
      typeof ajaxObj.loader == "boolean"
    ) {
      has_loader = ajaxObj.loader;
    }
    let succAlert = false;
    if (
      ajaxObj.hasOwnProperty("successAlert") &&
      (typeof ajaxObj.successAlert == "boolean" ||
        typeof ajaxObj.successAlert == "object")
    ) {
      succAlert = ajaxObj.successAlert;
    }
    let warnAlert = false;
    if (
      ajaxObj.hasOwnProperty("warningAlert") &&
      (typeof ajaxObj.warningAlert == "boolean" ||
        typeof ajaxObj.warningAlert == "object")
    ) {
      warnAlert = ajaxObj.warningAlert;
    }
    let succCallback = false;
    if (
      ajaxObj.hasOwnProperty("success") &&
      typeof ajaxObj.success == "function"
    ) {
      succCallback = ajaxObj.success;
    }
    let warnCallback = false;
    if (ajaxObj.hasOwnProperty("error") && typeof ajaxObj.error == "function") {
      warnCallback = ajaxObj.error;
    }

    if (checkMethod(method)) {
      await $.ajax({
        type: method,
        headers: {
          "X-Requested-With": "XMLHttpRequest",
        },
        url: url,
        data: data,
        timeout: 800000,
        beforeSend: function (xhr) {
          if(has_loader){
            loading(has_loader);
          }
        },
        success: function (data) {
          if(has_loader){
            loading(false);
          }
          // console.log(data);
          if (isJsonString(data)) {
            const data_json = JSON.parse(data);

            if (data_json.status == 1) {
              if (succAlert) {
                if (
                  !(
                    succAlert.hasOwnProperty("header") &&
                    succAlert.hasOwnProperty("body")
                  )
                ) {
                  if (succAlert) {
                    successAlert("Success!", data_json.result);
                  } else {
                    console.error(
                      "Missing success alert property \n Success:" +
                        JSON.stringify(succAlert)
                    );
                    throw new Error(
                      SyntaxError,
                      `Missing success alert property.`
                    );
                  }
                } else {
                  successAlert(succAlert.header, succAlert.body);
                }
              }
            } else if (data_json.hasOwnProperty("error")) {
              if (warnAlert) {
                if (
                  !(
                    warnAlert.hasOwnProperty("header") &&
                    warnAlert.hasOwnProperty("body")
                  )
                ) {
                  if (warnAlert) {
                    warningAlert("Error", data_json.result);
                  } else {
                    console.error(
                      "Missing warning alert property \n warning:" +
                        JSON.stringify(succAlert)
                    );
                    throw new Error(
                      SyntaxError,
                      `Missing success alert property.`
                    );
                  }
                } else {
                  warningAlert(warnAlert.header, warnAlert.body);
                }
              }
            }
          } else {
            if (succAlert) {
              if (
                !(
                  succAlert.hasOwnProperty("header") &&
                  succAlert.hasOwnProperty("body")
                )
              ) {
                if (succAlert) {
                  successAlert();
                } else {
                  console.error(
                    "Missing success alert property \n Success:" +
                      JSON.stringify(succAlert)
                  );
                  throw new Error(
                    SyntaxError,
                    `Missing success alert property.`
                  );
                }
              } else {
                successAlert(succAlert.header, succAlert.body);
              }
            }
          }
          if (succCallback) {
            succCallback(data);
          }
          response = data;
          return data;
        },
        error: function (error) {
            loading(false);
          if (warnAlert) {
            if (
              !(
                warnAlert.hasOwnProperty("header") &&
                warnAlert.hasOwnProperty("body")
              )
            ) {
              if (warnAlert) {
                warningAlert();
              } else {
                console.error(
                  "Missing warning alert property \n Success:" + warnAlert
                );
                throw new Error(SyntaxError, `Missing warning alert property.`);
              }
            } else {
              warningAlert(warnAlert.header, warnAlert.body);
            }
          }
          if (warnCallback) {
            warnCallback(error);
          }
          console.error(error);
          return error;
        },
      });

      return response;
    } else {
      console.error("Invalid method on: " + url);
      throw new Error(SyntaxError, `Invalid method ${method}`);
    }
  }
}

/**
 * It takes a file and returns a promise that resolves to the base64 representation of the file
 */
const toBase64 = (file, max_size = 5) =>
  new Promise((resolve, reject) => {
    if (file.size / 1024 ** 2 <= max_size) {
      const reader = new FileReader();
      reader.readAsDataURL(file);
      reader.onload = () => resolve(reader.result);
      reader.onerror = (error) => reject(error);
    } else {
      return false;
    }
  });

/**
 * It checks if the method is one of the four HTTP methods (GET, POST, PUT, DELETE) and returns true if
 * it is, and false if it isn't.
 * @param method - The HTTP method to use.
 * @returns A boolean value.
 */
function checkMethod(method) {
  method = method.toUpperCase();
  switch (method) {
    case "GET":
      return true;
      break;
    case "POST":
      return true;
      break;
    case "PUT":
      return true;
      break;
    case "DELETE":
      return true;
      break;
    default:
      return false;
      break;
  }
}

/**
 * If the page loader is visible, hide it. If it's not visible, show it.
 * @param is_visible - true or false
 * @returns The value of the is_visible parameter.
 */
function loading(is_visible) {
  $("#page-loader").toggle(is_visible);
  return is_visible;
}

/**
 * It creates a modal with the header and body specified in the function call
 * @param [header=Success!] - The header of the modal.
 * @param [body=Operation successfully completed!] - The body of the alert.
 */
function successAlert(
  header = "Success!",
  body = "Operation successfully completed!",
  callback = false
) {
  Swal.fire({
    html: `
      <div class="">
        <h5 class="mt-4 text-white">${header}</h5>
        <p class="mt-3 text-white">${body}</p>
      </div>
    `,
    icon: "success",
    iconColor: "#ffffff",
    background: "#40b6f9",
    buttonsStyling: false,
    confirmButtonText: "Okay",
    customClass: {
      confirmButton: "btn btn-sm bg-body text-primary",
    },
    width: "23em",
  }).then((response) => {
    if (callback) {
      callback();
    }
  });
}

/**
 * It takes two arguments, a header and a body, and displays them in a warning modal.
 * @param [header=Error] - The header of the modal
 * @param [body=Something went wrong] - The body of the alert.
 */
function warningAlert(
  header = "Error",
  body = "Something went wrong",
  callback = false
) {
  Swal.fire({
    html: `
      <div class="">
        <h5 class="mt-4 text-white">${header}</h5>
        <p class="mt-3 text-white">${body}</p>
      </div>
    `,
    icon: "warning",
    iconColor: "#ffffff",
    background: "#f47091",
    buttonsStyling: false,
    confirmButtonText: "Close",
    customClass: {
      confirmButton: "btn btn-sm bg-body text-danger",
    },
    width: "23em",
  }).then((response) => {
    if (callback) {
      callback();
    }
  });
}

/**
 * It creates a modal with a header and body, and if the user clicks the yes button, it will run the
 * function passed to the function.
 * @param [yes_callback=false] - The function to be called when the user clicks the "Yes" button.
 * @param [header=Notice!] - The header of the modal
 * @param [body=Are you sure you want to continue?] - The body of the modal
 */
let confirmationModal_callback_function;
function askConfirmation(
  yes_callback = false,
  header = "Notice!",
  body = "Are you sure you want to continue?",
  no_callback = false
) {
  Swal.fire({
    html: `
      <div class="">
        <h5 class="mt-4">${header}</h5>
        <p class="mt-3">${body}</p>
      </div>
    `,
    icon: "question",
    iconColor: "#ffc700",
    buttonsStyling: false,
    confirmButtonText: "Yes",
    denyButtonText: "Cancel",
    showDenyButton: true,
    customClass: {
      confirmButton: "btn btn-sm btn-warning text-dark",
      denyButton: "btn btn-sm btn-secondary",
    },
    width: "23em",
  }).then((response) => {
    if (response.isConfirmed) {
      if (yes_callback) {
        yes_callback();
      }
    }
    if (response.isDenied) {
      if (no_callback) {
        no_callback();
      }
    }
  });
}

/**
 * If the string is valid JSON, it will return true, otherwise it will return false.
 * @param str - The string to be checked
 * @returns A boolean value.
 */
function isJsonString(str) {
  try {
    JSON.parse(str);
  } catch (e) {
    return false;
  }
  return true;
}

/**
 * It checks if the given string is a valid email address.
 * @param email - The email address to validate.
 * @returns A boolean value.
 */
function validateEmail(email) {
  return String(email)
    .toLowerCase()
    .match(
      /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
    );
}

/**
 * It takes a number and returns the month name
 * @param val - The value of the month you want to convert.
 * @param [bool=false] - If true, it will return the month name of the previous month.
 * @returns A function that takes two parameters, val and bool.
 */
function toMonth(val, bool = false) {
  if (val >= 0) {
    if ((bool == false && val <= 11) || (bool == true && val <= 12)) {
      var months = [
        "January",
        "February",
        "March",
        "April",
        "May",
        "June",
        "July",
        "August",
        "September",
        "October",
        "November",
        "December",
      ];
      if (bool) {
        val = -1;
      }
      return months[val];
    } else {
      return new Error("Invalid values given");
    }
  } else {
    return new Error("Invalid values given");
  }
}

/**
 * It takes a string in the format of a MySQL date (YYYY-MM-DD) and returns a string in the format of a
 * human readable date (Month DD, YYYY).
 * @param str - The string that you want to convert.
 * @returns A string in the format of "Month day, year"
 */
function mySQLDateToText(str) {
  str = str.split(" ")[0];
  const month = toMonth(Number(str.split("-")[1] - 1));
  const day = str.split("-")[2];
  const year = str.split("-")[0];
  return `${month} ${day}, ${year}`;
}

/**
 * If the hour is greater than 12, subtract 12 from the hour and add 'pm' to the end of the string,
 * otherwise add 'am' to the end of the string.
 * @param str - The time in mySQL format (HH:MM:SS)
 */
function mySQLTimeToText(str) {
  let hour = Number(str.split(":")[0]);
  let minute = Number(str.split(":")[1]);

  let meridiem = hour >= 12 ? "pm" : "am";
  if (hour > 12) {
    hour -= 12;
  }
  hour = hour < 10 ? `0${hour}` : hour;
  minute = minute < 10 ? `0${minute}` : minute;

  return `${hour}:${minute} ${meridiem}`;
}

/**
 * The function `mySQLDateTimeToText` converts a MySQL datetime string to a more readable text format.
 * @param str - The `str` parameter is a string representing a date and time in the format used by
 * MySQL. It should be in the format "YYYY-MM-DD HH:MM:SS".
 * @returns The function `mySQLDateTimeToText` returns a formatted string that combines the result of
 * `mySQLDateToText` and `mySQLTimeToText` functions.
 */
function mySQLDateTimeToText(str) {
  return `${mySQLDateToText(str.split(" ")[0])} ${mySQLTimeToText(
    str.split(" ")[1]
  )}`;
}

/**
 * If the month and day of the current date is less than the month and day of the birthdate, then
 * subtract one from the age.
 * @param dateString - The date string to be parsed.
 * @returns The age of the person.
 */
function getAge(dateString) {
  var today = new Date();
  var birthDate = new Date(dateString);
  var age = today.getFullYear() - birthDate.getFullYear();
  var m = today.getMonth() - birthDate.getMonth();
  if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
    age--;
  }
  return age;
}

/**
 * It returns the first item in an array that has a property with a value equal to the id you pass in.
 * @param array - the array you want to search
 * @param id - the id of the item you want to find
 * @param id_name - the name of the id in the array
 * @returns The first element in the array that matches the condition.
 */
function searchArrayById(array, id, id_name = "id") {
  return array.find((array_item) => array_item[id_name] == id);
}

/**
 * The function searches an array of objects by a specified id and returns all objects that match the
 * id.
 * @param array - The array parameter is the array of objects that you want to search through. Each
 * object in the array should have an id property or a property with a different name specified by the
 * id_name parameter.
 * @param id - The `id` parameter is the value you want to search for in the array. It represents the
 * specific ID you are looking for.
 * @param [id_name=id] - The id_name parameter is an optional parameter that specifies the name of the
 * property in each object of the array that contains the id value. By default, it is set to "id".
 * @returns an array of objects from the input array that have a matching id value.
 */
function searchAllArrayById(array, id, id_name = "id") {
  return array.filter((array_item) => array_item[id_name] == id);
}

/**
 * It takes a form selector as an argument and resets the form.
 * @param form_selector - The selector of the form you want to reset.
 */
function resetForm(form_id) {
  document.querySelector(`#${form_id}`).reset();
}

/**
 * It takes a string, creates a new DOMParser, parses the string as HTML, and returns the text content
 * of the document element
 * @param input - The string to decode.
 * @returns The string "&lt;p&gt;Hello World&lt;/p&gt;"
 */
function htmlDecode(input) {
  var doc = new DOMParser().parseFromString(input, "text/html");
  return doc.documentElement.textContent;
}

/**
 * It reloads the dataTable with the new url if the url is provided, otherwise it reloads the dataTable
 * with the same url.
 * @param dataTable - The DataTable object
 * @param [url=false] - The URL to send the AJAX request to.
 */
function reloadDataTable(dataTable, url = false) {
  if (url) {
    dataTable.ajax.url(url).load();
  } else {
    dataTable.ajax.reload();
  }
}

/**
 *  It's a function that capitalizes the first letter of every word in a string. */
String.prototype.toTitleCase = function () {
  str = this.toLowerCase();
  return str.replace(/(^([a-zA-Z\p{M}]))|([ -][a-zA-Z\p{M}])/g, function (s) {
    return s.toUpperCase();
  });
};

String.prototype.toJSON = function (has_status = true) {
  const element = document.createElement("div");
  element.innerHTML = this;
  const str = element.innerHTML;
  if (isJsonString(str)) {
    const json = JSON.parse(str);
    if (has_status) {
      if (json["status"]) {
        return json;
      } else {
        return false;
      }
    }
    return json;
  }
  return false;
};

/**
 * The function toggles the visibility of a password field in a web form.
 * @param [bool=true] - A boolean value that determines whether the password should be visible or
 * hidden. If it is set to true, the password will be visible, and if it is set to false, the password
 * will be hidden.
 * @param target_element - The target_element parameter is the HTML element whose password visibility
 * is being toggled. It could be an input element of type "password" or any other element that has a
 * "type" attribute that can be set to "text" or "password".
 */
function viewPassword(bool = true, target_element) {
  if (bool) {
    target_element.setAttribute("type", "text");
  } else {
    target_element.setAttribute("type", "password");
  }
}

/**
 * The function `serializeObject` takes a form ID as input, serializes the form data into an object,
 * and returns the object.
 * @param form_id - The `form_id` parameter is the ID of the HTML form element that you want to
 * serialize.
 * @returns an object containing the serialized form data.
 */
function serializeObject(form_id) {
  const form_data = {};
  $(`#${form_id}`)
    .serializeArray()
    .forEach((field) => {
      form_data[field.name] = field.value;
    });
  return form_data;
}

/**
 * The function "reportForm" checks the validity of a form with a given ID.
 * @param form_id - The form_id parameter is a string that represents the id attribute of the form
 * element you want to validate.
 * @returns the result of the `reportValidity()` method called on the element with the specified
 * `form_id`.
 */
function reportForm(form_id) {
  return document.getElementById(form_id).reportValidity();
}

$(".mask-contact-number").mask("N00-000-0000", {
  translation: {
    N: {
      pattern: /9/,
    },
  },
});

function moveArrayValue(array, from_index, to_index) {
  if (to_index >= array.length) {
    let i = to_index - array.length + 1;
    while (i--) {
      array.push(undefined);
    }
  }
  array.splice(to_index, 0, array.splice(from_index, 1)[0]);
  return array;
}

/**
 * The function checks if a given file is an image file.
 * @param file - The `file` parameter is an object that represents a file. It typically contains
 * information about the file, such as its name, size, and type.
 * @returns a boolean value. It will return true if the file is an image file, and false otherwise.
 */
function isFileImage(file) {
  return file && file["type"].split("/")[0] === "image";
}

/**
 * The function `offsetZero` takes a string and adds leading zeros to it until it reaches a specified
 * offset length.
 * @param str - The `str` parameter is a string that you want to offset with zeros.
 * @param [offset=5] - The offset parameter is optional and has a default value of 5.
 * @returns the offsetted string.
 */
function offsetZero(str, offset = 5) {
  let offsetted_string = String(str);
  if (offsetted_string.length <= offset) {
    for (let index = offsetted_string.length; index <= offset; index++) {
      offsetted_string = "0" + offsetted_string;
    }
  }
  return offsetted_string;
}

/**
 * The function checks if a file exists by making an HTTP GET request to the file URL and returns a
 * boolean indicating whether the file exists or not.
 * @param file_url - The `file_url` parameter is the URL of the file that you want to check if it
 * exists.
 * @returns a boolean value indicating whether the file exists or not.
 */
async function fileExists(file_url) {
  let is_existing;
  try {
    await $.get(file_url)
      .done(function () {
        is_existing = true;
      })
      .fail(function () {
        is_existing = false;
      });
  } catch (error) {
    is_existing = false;
  }
  return is_existing;
}

String.prototype.ask = function(false_value){
  return this && this != "" ? this : false_value;
}

function downloadFile(file_url, file_name = false){
  const anchor = document.createElement("a");
  anchor.setAttribute("href", file_url);
  if(file_name){
    anchor.setAttribute("download", file_name);
  }

  anchor.click();
}