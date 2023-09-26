var numericFields = document.querySelectorAll(".numericField");
  
numericFields.forEach(function(element) {
  element.addEventListener("input", function (e) {
    // Allow only numbers and prevent non-numeric input
    this.value = this.value.replace(/[^0-9]/g, '');
  });
});