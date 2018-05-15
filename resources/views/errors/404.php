<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/89/three.min.js"></script>
<style>
body {
    background: #f5f5f5; font-family: 'Roboto', sans-serif;}
   
   .mini {
     font-size: 1em;
     text-shadow: 0 1px 0 #ccc, 
               0 2px 0 #c9c9c9,
               0 3px 0 #bbb,
               0 4px 0 #b9b9b9,
               0 5px 0 #555,
               0 6px 1px rgba(0,0,0,.1),
               0 0 5px rgba(0,0,0,.1),
               0 1px 3px rgba(0,0,0,.3),
               0 3px 5px rgba(0,0,0,.2),
               0 5px 10px rgba(0,0,0,.25),
               0 10px 10px rgba(0,0,0,.2),
               0 20px 20px rgba(0,0,0,.15);

     color: #000;
     line-height: 9em;
     text-indent: 2.5em;
     position: absolute;
     left: 50%;
     top: 50%; 
   }
   .mini, .mega, .bola {
    color: rgb(246,230,70);
    font-family: 'Tahoma', sans-serif;
   }
   .mega, .bola {
     line-height: 1.65em;
     font-weight: bold;
     font-size: 11em; 
   }
   .mega{
     width: 300px;
     height: 300px;
     position: absolute;
     left: 50%;
     top: 50%; 
     margin-left: -150px;
     margin-top: -150px;
    }

    .bola{
     width: 1em;
     height: 1em;
     position: absolute;
     left: 50%;
     top: 50%; 
     margin-left: -50px;
     margin-top: -150px;
    }
    
   .boom {color: #f5f5f5; }
</style>
</head>
<body>
    <p class="mega">4<span class="boom">0</span>4
        <div class="bola">
        </div>
    </p>
    <p class="mini">Sorry that page hasn't been extruded yet!</p>
<script>
    // taken with gratitude from https://codepen.io/xwu/pen/wvAbF/
var $container = $('.bola');
var renderer = new THREE.WebGLRenderer({antialias: true});
var camera = new THREE.PerspectiveCamera(80,1,0.1,10000);
var scene = new THREE.Scene();

scene.add(camera);
renderer.setSize(125,125);
$container.append(renderer.domElement);

///////////////////////////////////////////////

// Camera
camera.position.z = 200;

// Material
var yellowMat = new THREE.MeshPhongMaterial({
  color      :  new THREE.Color("rgb(226,210,50)"),
  emissive   :  new THREE.Color("rgb(10,10,10)"),
  specular   :  new THREE.Color("rgb(100,100,100)"),
  shininess  :  75,
  shading    :  THREE.FlatShading,
  transparent: 1,
  opacity    : 1
});

var L1 = new THREE.PointLight( 0xffffff, 1);
L1.position.z = 100;
L1.position.y = 100;
L1.position.x = 100;
scene.add(L1);

var L2 = new THREE.PointLight( 0xffffff, 0.8);
L2.position.z = 200;
L2.position.y = 400;
L2.position.x = -100;
scene.add(L2);

// IcoSphere -> THREE.IcosahedronGeometry(80, 1) 1-4
var Ico = new THREE.Mesh(new THREE.IcosahedronGeometry(125,1), yellowMat);
Ico.rotation.z = 0.25;
scene.add(Ico);

function update(){
   Ico.rotation.x+=2/100;
   Ico.rotation.y+=2/100;
}

// Render
function render() {
  requestAnimationFrame(render);			
  renderer.render(scene, camera);	
  update();
}

render();
</script>
</body>
</html>