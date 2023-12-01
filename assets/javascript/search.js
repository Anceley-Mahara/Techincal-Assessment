function validateForm() {
	var letters = /^[A-Za-z]+$/;
	var productName = document.forms["searchForm"]["productName"].value;
    var category = document.forms["searchForm"]["category"].value;

	if (productName == "" || category == "") {
	  alert("Search fields must be filled out");
	  return false;
	}else if (productName.match(letters)){
		return true;
	}
  }

