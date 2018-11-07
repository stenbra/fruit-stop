var app = new Vue({
  el: '#app',
  data: {
    product: "",
    id: 0
  },
  methods: {
    allRecords: function(){

      axios.get('./ajax.php')
      .then(function (response) {
         app.product = response.data;
      })
      .catch(function (error) {
         console.log(error);
      });
    },
    recordVeg: function(){


        axios.get('./ajax.php', {
           params: {
             id: 1
           }
        })
        .then(function (response) {
           app.product = response.data;
        })
        .catch(function (error) {
           console.log(error);
        });
      
    },
	    recordFruit: function(){


        axios.get('./ajax.php', {
           params: {
             id: 2
           }
        })
        .then(function (response) {
           app.product = response.data;
        })
        .catch(function (error) {
           console.log(error);
        });
      
    },
	    recordBerry: function(){


        axios.get('./ajax.php', {
           params: {
             id: 3
           }
        })
        .then(function (response) {
           app.product = response.data;
        })
        .catch(function (error) {
           console.log(error);
        });
      
    }
  }
})
