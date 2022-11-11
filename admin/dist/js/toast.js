function showToast(text, variant) {
  switch (variant) {
    case 'success':
      style = {
        background: "linear-gradient(to right, #00b09b, #96c93d)"
      }
      break;
    case 'danger':
      style = {
        background: "linear-gradient(to right, #dc3545, #e14d58, #e5616b, #e8747d, #ea868f)"
      }
      break;

    case 'info':
      style = {
        background: "linear-gradient(to right, #0dcaf0, #36cff1, #4dd5f3, #5edaf4, #6edff6)"
      }
      break;

    default:
      break;
  }
  Toastify({
    text: text,
    duration: 3000,
    style: style
  }).showToast();
}