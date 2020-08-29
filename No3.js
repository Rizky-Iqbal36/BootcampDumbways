var data = [
  ['a','c','b','e','d'],
  ['g','e','f'],
]
var datalain = [
  ['g','h','i','j'],
  ['a','c','b','e','d'],
  ['g','e','f'],
]
sortindeks(datalain);
function sortindeks(array){
  console.log("before :\n");
  console.log(array);
  let temp = [];
  for(let i = 0;i<array.length;i++){
    array[i].sort();
    for(let j = i+1;j<array.length;j++){
      if(array[i].length>array[j].length){
        temp[1] = array[i];
        array[i] = array[j];
        array[j] = temp[1];
      }
    }
  }
  console.log("after :\n");
  console.log(array);
}