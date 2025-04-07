function copy(page) {
  console.log("kldjflk");
  fetch(`exportCOPY.php?page=${page}`)
    .then((response) => response.text())
    .then((data) => {
      const tmpInput = document.createElement("input");
      tmpInput.value = data;
      tmpInput.select();
      navigator.clipboard.writeText(tmpInput.value);
    })
    .catch((error) => console.error("Error:", error));
}
