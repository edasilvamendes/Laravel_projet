(function () {

	console.log("test");

    $(".delete").on("submit", function(){
        return confirm("Etes-vous sur de vouloir supprimer ce post ?");
    });

})($)