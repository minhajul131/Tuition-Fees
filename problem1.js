var ops = ["7","-8","9","R","D","10","+","+"];
var array = [];
var result = 0;

for (let i = 0; i < ops.length; i++){

    if (ops[i] === "R"){
        array.pop();
    }
    else if (ops[i] === "D"){
        array.push(array[array.length - 1] * 2);
    }
    else if (ops[i] === "+"){
        array.push(array[array.length - 1] + array[array.length - 2]);
    }
    else{
        array.push(ops[i] * 1);
    }
}
console.log(array);

for (let index = 0; index < array.length; index++){
    result += array[index];
}
console.log(`Sum of all elements : ${result}`);