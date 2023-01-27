// Sing in show password toggler button
function password_show_hide(input_id, show_id, hide_id) {
  const x = document.getElementById(input_id);
  const show_eye = document.getElementById(show_id);
  const hide_eye = document.getElementById(hide_id);
  hide_eye.classList.remove("d-none");
  if (x.type === "password") {
    x.type = "text";
    show_eye.style.display = "none";
    hide_eye.style.display = "block";
  } else {
    x.type = "password";
    show_eye.style.display = "block";
    hide_eye.style.display = "none";
  }
}
