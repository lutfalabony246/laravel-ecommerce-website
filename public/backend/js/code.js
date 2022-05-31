
			$(function(){
                $(document).on('click', '#delete', function(e)
                {
                    e.preventDefault();
                    var link = $(this).attr("href");
                    
                    Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                        )
                    }
                    })
    
                }); // document end	
                    
                }); // main funcations end




    // confirm order       
    $(function(){
        $(document).on('click','#confirm',function(e){
            e.preventDefault();
            var link = $(this).attr("href");
    
    
                      Swal.fire({
                        title: 'Are you sure to Confirm?',
                        text: "Once Confirm, You will not be able to pending again",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, Confirm!'
                      }).then((result) => {
                        if (result.isConfirmed) {
                          window.location.href = link
                          Swal.fire(
                            'Confirm!',
                            'Confirm Changes',
                            'success'
                          )
                        }
                      }) 
    
    
        });
    
      }); 



// processing order
$(function(){
    $(document).on('click','#processing',function(e){
        e.preventDefault();
        var link = $(this).attr("href");


                  Swal.fire({
                    title: 'Are you sure to Processing?',
                    text: "Once Processing, You will not be able to pending again",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Processing!'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = link
                      Swal.fire(
                        'Processing!',
                        'Processing Changes',
                        'success'
                      )
                    }
                  }) 


    });

  });

//picked order
$(function(){
    $(document).on('click','#picked',function(e){
        e.preventDefault();
        var link = $(this).attr("href");


                  Swal.fire({
                    title: 'Are you sure to Picked?',
                    text: "Once Picked, You will not be able to pending again",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Picked!'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = link
                      Swal.fire(
                        'Picked!',
                        'Picked Changes',
                        'success'
                      )
                    }
                  }) 


    });

  });

// shipped order
$(function(){
    $(document).on('click','#shipped',function(e){
        e.preventDefault();
        var link = $(this).attr("href");


                  Swal.fire({
                    title: 'Are you sure to shipped?',
                    text: "Once shipped, You will not be able to pending again",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, shipped!'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = link
                      Swal.fire(
                        'shipped!',
                        'shipped Changes',
                        'success'
                      )
                    }
                  }) 


    });

  });

  //delivered order
$(function(){
    $(document).on('click','#delivered',function(e){
        e.preventDefault();
        var link = $(this).attr("href");


                  Swal.fire({
                    title: 'Are you sure to delivered?',
                    text: "Once delivered, You will not be able to pending again",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delivered!'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = link
                      Swal.fire(
                        'delivered!',
                        'delivered Changes',
                        'success'
                      )
                    }
                  }) 


    }); 

  });


  //delivered order
  $(function(){
    $(document).on('click','#canceled',function(e){
        e.preventDefault();
        var link = $(this).attr("href");


                  Swal.fire({
                    title: 'Are you sure to Cancel Order?',
                    text: "Once Cancel, You will not be able to pending again",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Cancel!'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = link
                      Swal.fire(
                        'Cancel!',
                        'Cancel Changes',
                        'success'
                      )
                    }
                  }) 


    }); 

  });



    //Prossing order
$(function(){
  $(document).on('click','#processing',function(e){
      e.preventDefault();
      var link = $(this).attr("href");


                Swal.fire({
                  title: 'Are you sure to Processing?',
                  text: "Once Processing, You will not be able to pending again",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, Processing!'
                }).then((result) => {
                  if (result.isConfirmed) {
                    window.location.href = link
                    Swal.fire(
                      'Processing!',
                      'Processing Changes',
                      'success'
                    )
                  }
                }) 


  });

});

//picked
