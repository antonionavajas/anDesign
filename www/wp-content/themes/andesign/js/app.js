(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);throw new Error("Cannot find module '"+o+"'")}var f=n[o]={exports:{}};t[o][0].call(f.exports,function(e){var n=t[o][1][e];return s(n?n:e)},f,f.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
var container, clock, camera, scene, renderer, model, btnMenu;

window.onload = function(event){
  AOS.init({
    duration: 2400,
  });
  btnMenu = document.getElementById("btnMenu");
  btnMenu.addEventListener("click", showMenu);
  if(document.getElementById("3dAnimation")){
    init("3dAnimation");
    animate();
  }
}

function showMenu(ev){
  ev.preventDefault();
  ev.stopPropagation();
  var menu = document.getElementById("navMenu");
  if(hasClass(menu, "open")){
    menu.classList.remove("open");
  }else{
    menu.classList.add("open");
  }
  return false;
}

function hasClass(element, cls) {
  return (' ' + element.className + ' ').indexOf(' ' + cls + ' ') > -1;
}

function init(element) {
	container = document.getElementById( element );
	camera = new THREE.PerspectiveCamera( 45, container.clientWidth / container.clientWidth, 0.1, 2000 );
	camera.position.set( 3, 3, 3 );
	camera.lookAt( new THREE.Vector3( 0, 0, 0 ));
	scene = new THREE.Scene();
	clock = new THREE.Clock();
	var loadingManager = new THREE.LoadingManager( function() {
		scene.add( model );
	} );
	var loader = new THREE.ColladaLoader( loadingManager );
	loader.load( templateUrl + '/assets/models/anDesign.dae', function ( collada ) {
		model = collada.scene;

	} );
	var ambientLight = new THREE.AmbientLight( 0xcccccc, 0.4 );
	scene.add( ambientLight );
	var directionalLight = new THREE.DirectionalLight( 0xffffff, 0.8 );
	directionalLight.position.set( 1, 1, 0 ).normalize();
	scene.add( directionalLight );
	renderer = new THREE.WebGLRenderer({alpha: true});
	renderer.setPixelRatio( window.devicePixelRatio );
	renderer.setSize( container.clientWidth, container.clientWidth);
	container.appendChild( renderer.domElement );
	window.addEventListener( 'resize', onWindowResize, false );
}

function onWindowResize() {
	camera.aspect = container.clientWidth / container.clientWidth;
	camera.updateProjectionMatrix();
	renderer.setSize( container.clientWidth, container.clientWidth );
}

function animate() {
	requestAnimationFrame( animate );
	render();
}

function render() {
	var delta = clock.getDelta();
	if ( model !== undefined ) {
		model.rotation.z += delta * 0.3;
	}
	renderer.render( scene, camera );
}

},{}]},{},[1])
