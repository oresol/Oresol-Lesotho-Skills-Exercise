var category = document.getElementById('category');
var newcategory = document.getElementById('newcategory');
var tags = document.getElementById('tag');
var newtag = document.getElementById('newtag');

category.addEventListener('change', function(){
    newcategory.value = category.value;
})

tags.addEventListener('change', function(){
    
    var value = newtag.value == "" ? tags.value : tags.value == "" ? newtag.value : newtag.value + "," + tags.value;
    var arr = value.split(",")
    arr = removeDuplicate(arr)
    newtag.value = arr.toString()

})

function removeDuplicate(arr)
{
    let outpt = Array.from(new Set(arr))
    return outpt;
}

