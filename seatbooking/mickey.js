
document.addEventListener('DOMContentLoaded', function(){

  const xhr = new XMLHttpRequest();
  xhr.open("GET", "index2.php", true);

  xhr.onload = function(){
    if (xhr.status === 200){
      const takenSeats =JSON.parse(xhr.responseText);

      const seats = document.querySelectorAll('.seatCharts-seat');

      seats.forEach(function(seat){
        if(takenSeats.includes(seat)){
          seat.classList.add('unavailable');
        }else {
          seat.classList.add('available');
        }
        seat.addEventListener('click', function(){
          if(seat.classList.contains('available')){
            seat.classList.remove('available');
            seat.classList.add('selected');
    
            console.log('Selected seat:', this.dataset.seat);
          }else if (seat.classList.contains('selected')){
            seat.classList.remove('selected');
            seat.classList.add('available');
            
            
            console.log('Deselected seat:', this.id);
          }
        });
      });
    }
  }

  
  
});