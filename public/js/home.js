const favourite=document.getElementsByClassName("favourite-icon");
console.log(favourite)
Array.from(favourite).forEach(card => {
  card.addEventListener('click',(e)=>{
    // e.preventDefault()
    // let id=card.id
    if(card.classList.contains('fa-solid')){
      card.classList.remove("fa-solid")
      card.classList.add("fa-regular")
    }else{
      card.classList.remove("fa-regular")
      card.classList.add("fa-solid")
    }
  })
});