window.onload = init;

function init() {
  reset_enroll_id();

  var button = document.getElementById('enroll_form_sumbit');
  button.onclick = reset_enroll_id;

  var unitForm = document.getElementById('unit_list');
  unitForm.onclick = get_unit_name;
}

function reset_enroll_id(){
  var enrollId = generate_random();
  console.log(enrollId);
  var enrollBox = document.getElementById('enroll_id');
  enrollBox.value = enrollId;
}

function generate_random(){
  var randoma = "";
  var random = 10;
  for( i = 1; i <= 10; i++){
    var c = parseInt(3*Math.random())+1;
    if( c == 1 ){ var a = Math.random().toString(36)[5]; }
    if( c == 2 ){ var a = Math.random().toString(36)[5].toUpperCase(); }
    if( c == 3 ){ var a = Math.floor((Math.random() * 10) + 1).toString(); }
    randoma = randoma+a;
  }
  return randoma;
}