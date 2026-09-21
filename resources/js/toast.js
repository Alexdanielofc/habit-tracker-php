console.log('Toast script loaded');

setTimeout(() => {
  const $toast = document.getElementById('toast');
  if ($toast) {
    $toast.remove();
  }
}, 3000);
