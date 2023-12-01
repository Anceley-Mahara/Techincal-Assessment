function validateCategory() {
	var selectedCategory = document.forms["categoryForm"]["category"].value;

	if (selectedCategory == "") {
	  alert("Search fields must be filled out");
	  return false;
  }
}