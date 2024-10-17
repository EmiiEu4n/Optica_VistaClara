var input = document.getElementById('telefono');

input.oninvalid = function(event){
 event.target.setCustomValidity('Hola mundo');
}