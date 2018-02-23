var container, clock;
var camera, scene, renderer, model;

window.onload = function(event){
  AOS.init({
    duration: 1200,
  });
  init("3dAnimation");
  animate();
}

function init(element) {
	container = document.getElementById( element );
	camera = new THREE.PerspectiveCamera( 45, container.clientWidth / container.clientWidth, 0.1, 2000 );
	camera.position.set( 4, 4, 4 );
	camera.lookAt( new THREE.Vector3( 0, 0, 0 ) );
	scene = new THREE.Scene();
	clock = new THREE.Clock();
	var loadingManager = new THREE.LoadingManager( function() {
		scene.add( model );
	} );
	var loader = new THREE.ColladaLoader( loadingManager );
	loader.load( '../assets/models/anDesign.dae', function ( collada ) {
		model = collada.scene;

	} );
	var ambientLight = new THREE.AmbientLight( 0xcccccc, 0.4 );
	scene.add( ambientLight );
	var directionalLight = new THREE.DirectionalLight( 0xffffff, 0.8 );
	directionalLight.position.set( 1, 1, 0 ).normalize();
	scene.add( directionalLight );
	renderer = new THREE.WebGLRenderer();
	renderer.setPixelRatio( window.devicePixelRatio );
	renderer.setSize( container.clientWidth, container.clientWidth);
	container.appendChild( renderer.domElement );
	scene.background = new THREE.Color("rgb(236, 239, 242)");
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
