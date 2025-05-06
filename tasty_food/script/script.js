const but_menu = document.querySelector('#button-menu');
const menu = document.querySelector('#slide-menu');

but_menu.addEventListener('click', () => {
    menu.classList.toggle('disp')
});


function addIngredientField() {
  var container = document.getElementById("ingredient_fields");
  var input = document.createElement("input");
  input.type = "text";
  input.name = "ingredients[]";
  input.required = true;
  
  var removeButton = document.createElement("button");
  removeButton.type = "button";
  removeButton.innerHTML = "Удалить ингредиент";
  removeButton.onclick = function() {
    removeIngredientField(this);
  };
  
  var fieldContainer = document.createElement("div");
  fieldContainer.appendChild(input);
  fieldContainer.appendChild(removeButton);
  
  container.appendChild(fieldContainer);
}

function removeIngredientField(button) {
  var fieldContainer = button.parentNode;
  fieldContainer.parentNode.removeChild(fieldContainer);
}

function addInstructionField() {
  var container = document.getElementById("instruction_fields");
  var textarea = document.createElement("textarea");
  textarea.name = "instructions[]";
  textarea.rows = "3";
  textarea.required = true;
  
  var removeButton = document.createElement("button");
  removeButton.type = "button";
  removeButton.innerHTML = "Удалить шаг в инструкции";
  removeButton.onclick = function() {
    removeInstructionField(this);
  };
  
  var fieldContainer = document.createElement("div");
  fieldContainer.appendChild(textarea);
  fieldContainer.appendChild(removeButton);
  
  container.appendChild(fieldContainer);
}

function removeInstructionField(button) {
  var fieldContainer = button.parentNode;
  fieldContainer.parentNode.removeChild(fieldContainer);
}


