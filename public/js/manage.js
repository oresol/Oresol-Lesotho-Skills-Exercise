

const editTag = (e)=>{
    console.log(e)
    const tagDis = document.getElementById(e.id);
    tagDis.remove();

    const formId = e.id+"fm"
    const form = document.getElementById(formId);
    form.style.display = 'block'

}

const editCategory = (e)=>{
    const tagDis = document.getElementById(e.id);
    tagDis.remove();

    const formId = e.id+"fm"
    const form = document.getElementById(formId);
    form.style.display = 'block'

}

