tergetAddForm=document.querySelector("#target-addForm")
addPlat=document.querySelector("#add-images")
declineAddPlat=document.querySelector("#decline-button")
closeAddPlatModal=document.querySelector("#closeAdd-modal")
alertBorder=document.querySelector("#alert-border")
closeAlert=document.querySelector("#close-alert")
if(alertBorder){
    closeAlert.onclick=()=>{
        alertBorder.classList.add('hidden');
        alertBorder.classList.remove('flex')
    }
}
alertBordertwo=document.querySelector("#alert-border-2")
closeAlerttwo=document.querySelector("#close-alert-2")
if(alertBordertwo){
    closeAlerttwo.onclick=()=>{
        alertBorder.classList.add('hidden');
        alertBorder.classList.remove('flex')
    }
}
if(tergetAddForm){
    tergetAddForm.onclick=()=>{
        addPlat.classList.add('flex');
        addPlat.classList.remove('hidden')
    }
    closeAddPlatModal.onclick=()=>{
        addPlat.classList.add('hidden');
        addPlat.classList.remove('flex')
    }
    declineAddPlat.onclick=()=>{
        addPlat.classList.add('hidden');
        addPlat.classList.remove('flex')
    }
}
tergetAddMenu=document.querySelector("#target-addMenu")
addMenu=document.querySelector("#add-Menu")
declineAddMenu=document.querySelector("#decline-menu")
closeAddPlatMenu=document.querySelector("#closeAdd-menu")
alertBorder=document.querySelector("#alert-border")
closeAlert=document.querySelector("#close-alert")
if(tergetAddMenu){
    tergetAddMenu.onclick=()=>{
        addMenu.classList.add('flex');
        addMenu.classList.remove('hidden')
    }
    closeAddPlatMenu.onclick=()=>{
        addMenu.classList.add('hidden');
        addMenu.classList.remove('flex')
    }
    declineAddMenu.onclick=()=>{
        addMenu.classList.add('hidden');
        addMenu.classList.remove('flex')
    }
}