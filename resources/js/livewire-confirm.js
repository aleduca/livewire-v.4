let confirmInitialized = false;
Livewire.hook('component.init', ({ component }) => {
  if(component.el.hasAttribute('wire:confirm') && component.el.hasAttribute('wire:confirm-title')){
    if(!confirmInitialized){
      let action = component.el.getAttribute('wire:click');
      window.confirm = function(message){
            Swal.fire({
                  title: component.el.getAttribute('wire:confirm-title') || 'Tem certeza?',
                  text: message,
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#22c55e',
                  cancelButtonColor: 'red',
                  confirmButtonText: 'Confirm',
                  cancelButtonText: 'Cancel',
              }).then((result) => {
                  if (result.isConfirmed){
                    component.$wire[action]();
                  }
              });
          }
      confirmInitialized = true;
    }
  }
})