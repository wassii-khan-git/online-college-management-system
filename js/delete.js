		
//  script for getting the id from the row
// deletes = document.getElementsByClassName('delete');
// Array.from(deletes).forEach((elementt) => {
//     elementt.addEventListener("click", (e) => {
//         console.log(e);
//         tr = e.target.parentNode.parentNode.parentNode;
//         id_del = tr.getElementsByTagName("td")[0].innerText;
//         id_delete.value = id_del;
//         console.log(tr);
//         console.log(id_del);

//     });
// });

$(document).ready(function () {

    $('.delete').on('click', function () {
        
        $tr = $(this).closest('tr');
    
        var data = $tr.children("td").map(function () {
            return $(this).text();
        }).get();
    
        console.log(data);
    
        $('#hidden_id').val(data[0]);
    
    });
});

// script for getting the value for grid view
deletes_grid = document.getElementsByClassName('delete_grid');
Array.from(deletes_grid).forEach((element) => {
    element.addEventListener("click" , (e) =>{
       console.log(e);
       li = e.target.parentNode.parentNode.parentNode.parentNode.parentNode
       deletes_grid_id = li.getElementsByTagName("li")[0].innerText;
       delete_grid_id_value.value = deletes_grid_id;
       console.log(li);   
       console.log(deletes_grid_id);

    });                           
});