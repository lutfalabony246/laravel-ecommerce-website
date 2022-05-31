const decrementNumber = (incdec) => {
  var itemval = document.getElementById(incdec);
  if (itemval.value <= 0) {
    itemval.value = 0;
  } else {
    itemval.value = parseInt(itemval.value) - 1;
  }

}
const incrementNumber = (incdec) => {
  var itemval = document.getElementById(incdec);
  if (itemval.value >= 10000) {
    itemval.value = 10000;
  } else {
    itemval.value = parseInt(itemval.value) + 1;
  }

}

