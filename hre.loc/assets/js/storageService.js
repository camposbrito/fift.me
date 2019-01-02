var storageService = angular.module('storageService', []);  

storageService.factory('LocalStorageService', function () {                  
    // var LocalStoreList = {};  
    return {  
        // list: employeeList,  
        set: function (item, value) {  
            if (window.localStorage) {  
                //Local Storage to add Data  
                sessionStorage.setItem(item, value);  
            }  
            // employeeList = EmployeesArr;  
             
        },  
        get: function (item) {  
            //Get data from Local Storage  
            return sessionStorage.getItem(item);
        }  
    };  

}); 