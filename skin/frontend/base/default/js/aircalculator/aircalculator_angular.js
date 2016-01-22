/**
 * Created by Alexandr Krivonos
 * Date: 11/10/15
 */

(function(){
    angular.module('aircalculatorApp',['ngRoute', 'ngResource'])
        .controller('aircalculatorCtrl',['$scope', '$http', function($scope, $http){

            // init
            $http.get('/aircalculator/index/getAjaxIndexData')
                .then(function (response) {
                // 200-299
                $scope.dataItems= response.data;
                $scope.fields   = {};

                // values by default for <select> / each and set on a "key" - because of sort value
                angular.forEach($scope.dataItems, function(value, key) {

                    if(value['aircalculator_field_type'] == 2 && value['aircalculator_field_key'] == 'windows_orientation') {
                        // Select (type 2)
                        // windows_data необходима для aircalculator_list.html->select. @todo - промежуточный костыль - поправить
                        $scope.windows_data = angular.fromJson(value['aircalculator_field_value']);

                        // вытаскиваю/устанавливаю значение по умолчанию в select для windows_orientation_id
                        angular.forEach(angular.fromJson(value['aircalculator_field_value']), function (v, k) {
                            angular.forEach(v, function (value_inner, key_inner) {
                                if (key_inner == 'active' && value_inner) {
                                    $scope.fields.windows_orientation_id = v.id;
                                    $scope.fields.windows_orientation_val = v.val;
                                }
                            });
                        });
                    }else if(value['aircalculator_field_type'] == 3){
                        // Settings (type 3)
                        if(value['aircalculator_field_key'] == 'settings_h1') $scope.fields.settings_h1 = value['aircalculator_field_value'];
                    }
                });

            }, function (response) {
                // error status(400-499) and other error
                //console.log('error', response.status, response.data);
            });

            // устанавливаю новое значение для windows_orientation_val - необходимо из-за совпадающих значений .val/ и некорректного выбора в select
            $scope.$watch('fields.windows_orientation_id', function(){
                angular.forEach($scope.windows_data, function (v, k) {
                    angular.forEach(v, function (value_inner, key_inner) {
                        if (key_inner == 'id' && value_inner == $scope.fields.windows_orientation_id) {
                            $scope.fields.windows_orientation_val = v.val;
                        }
                    });
                });
            },true);
        }])
})();
