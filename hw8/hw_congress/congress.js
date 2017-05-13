//alert("what??");
function openNav() {
	$("#sidenav").css("width", "15%");
}
function closeNav() {
	$("#sidenav").css("width", "0px");
}
//		var t = document.getElementById("toggle");
//		alert(t.innerHTML);
//		alert($("#toggle").css("width"));
$(function() {
	$("#toggle").click(function() {

		if ($("#sidenav").css("width") == "0px")
			openNav();
		else
			closeNav();
	});		
	
	$("#legislators th").addClass("col-md-2 col-lg-2");
	$("#legislators td").addClass("col-md-2 col-lg-2");
	$("#house th").addClass("col-md-2 col-lg-2");
	$("#house td").addClass("col-md-2 col-lg-2");
	$("legislators th").css("text-align", "center");
});

//alert("haha " + localStorage.getItem("legislators"));
(function() {
	var app = angular.module('congress', ['angularUtils.directives.dirPagination']);
    app.controller('page', function($scope, $http) {
//		alert(localStorage.getItem("legislators") == null || localStorage.getItem("legislators") == false);
		$scope.currentPage = 1;
  		$scope.pageSize = 10;
		this.tab = 1;
		this.navBar = 1;
		$scope.element = null;
		this.setTab = function(newValue){
      		this.tab = newValue;
			this.navBar = 1;
			if (newValue == 3) {
//				alert("Haha");
				for (var i = 0; i < $scope.committees.length; ++i)
					this.setCom($scope.committees[i]);
				$scope.nowCom = $scope.comH;
//				alert($scope.nowCom.length);
			} else if (newValue == 4) {
				$scope.F1 = JSON.parse(localStorage.getItem("legislators"));
				for (var i = 0; i < $scope.F1.length; i++)
				{
					if ($scope.F1[i].chamber == 'House')
						$scope.F1[i].chamber = "house";
					if ($scope.F1[i].chamber == 'Senate')
						$scope.F1[i].chamber = "senate";
				}
				localStorage.setItem("legislators", JSON.stringify($scope.F1));
				$scope.F2 = JSON.parse(localStorage.getItem("bills"));
				$scope.F3 = JSON.parse(localStorage.getItem("coms"));
//				alert(JSON.stringify($scope.F1));
//				alert(JSON.stringify($scope.F2));
//				alert(JSON.stringify($scope.F3));
			}
    	};
		this.setNavBar = function(newValue) {
			this.navBar = newValue;	
			if (this.tab == 3)
			{
				if(newValue == 1)
					$scope.nowCom = $scope.comH;
				else if (newValue == 2)
					$scope.nowCom = $scope.comS;
				else
					$scope.nowCom = $scope.comJ;
			}
		};
		this.getNavBar = function() {
			return this.navBar;	
		};
		this.isNavBar = function(x) {
			return (this.navBar == x);
		};
		if (!localStorage.getItem("legislators")) {
			var favLegislators = [];      
			localStorage.setItem("legislators", JSON.stringify(favLegislators));	
		}
		if (!localStorage.getItem("bills")) {
			var favBills = [];
			localStorage.setItem("bills", JSON.stringify(favBills));		
		}
		if (!localStorage.getItem("coms")) {
			var favCommittees = [];
			localStorage.setItem("coms", JSON.stringify(favCommittees));			
		}
//		alert("initial: " + localStorage.getItem("legislators"));      //test
		this.setElement = function(ele) {
			$scope.element = ele;
			var start = $scope.element.term_start.split("-");
			$scope.element.date_term_start = new Date(start[0], start[1], start[2]);
			var end = $scope.element.term_end.split("-");
			$scope.element.date_term_end = new Date(end[0], end[1], end[2]);
			var bir = $scope.element.birthday.split("-");
			$scope.element.date_birth = new Date(bir[0], bir[1], bir[2]);
			var n = Date.now();
			$scope.element.progress = parseInt((n - $scope.element.date_term_start.getTime()) / ($scope.element.date_term_end.getTime() - $scope.element.date_term_start.getTime()) * 100);
//			alert("state: " + ele.bioguide_id + " : " +  localStorage.getItem(ele.bioguide_id) + " && " + localStorage.getItem("legislators"));
			if(localStorage.getItem(ele.bioguide_id) == "yes")
			{
				$scope.element.isFavorite = "yes";
//				alert("y");
			}
			else
			{
				$scope.element.isFavorite = "no";
//				alert("n");
			}
			$http({
				method: 'GET',
				url: 'congress.php?id=4&type=1&l=' + ele.bioguide_id
				//https://congress.api.sunlightfoundation.com
			}).then(function successCallback(response) {
				$scope.legi_bills = response.data.results;
//				alert(JSON.stringify($scope.legi_bills[0].urls));
//				alert(JSON.stringify($scope.legi_bills[1].urls));
//				alert(JSON.stringify($scope.legi_bills[2].urls));
			}, function errorCallback(response) {
				alert("ERROR!");
			});
			$http({
				method: 'GET',
				url: 'congress.php?id=4&type=2&l=' + ele.bioguide_id
			}).then(function successCallback(response) {
				$scope.legi_coms = response.data.results;
//				alert(JSON.stringify($scope.legi_coms));
			}, function errorCallback(response) {
				alert("ERROR!");
			});
		};
		this.clickEmpty1 = function() {
//			alert("type: " + type + "; element: " + JSON.stringify(x));
			$scope.element.isFavorite = "yes";
//			alert("before set favorite" + localStorage.getItem($scope.element.bioguide_id));
//			alert("before: " + localStorage.getItem("legislators"));
			var a = JSON.parse(localStorage.getItem("legislators"));    // get an array
//			alert("type : " + typeof a);
			a.push($scope.element);
//				alert("after push: " + JSON.stringify(a));
			localStorage.setItem("legislators", JSON.stringify(a));
			localStorage.setItem($scope.element.bioguide_id, "yes");
//			alert("after clickempty: id " +$scope.element.bioguide_id + " && " +localStorage.getItem($scope.element.bioguide_id) + "; whole: " + localStorage.getItem("legislators"));
		};
		this.clickFull1 = function() {
//			alert(type + " && " + JSON.stringify($scope.element));
			$scope.element.isFavorite = "no";
			var a = JSON.parse(localStorage.getItem("legislators"));
			var pos = 0;      // find the element to be removed
			for (var i = 0; i < a.length; i++)
				if (a[i].bioguide_id == $scope.element.bioguide_id)
					pos = i;
			a.splice(pos, 1);
			localStorage.setItem("legislators", JSON.stringify(a));
			localStorage.setItem($scope.element.bioguide_id, "no");
//			alert("after clickfull: id " + $scope.element.bioguide_id + " - " +localStorage.getItem($scope.element.bioguide_id) + ": " + localStorage.getItem("legislators"));
		};
		this.del1 = function(x) {
			x.isFavorite = "no";
//			alert("before del1: " + localStorage.getItem("legislators"));
			var a = JSON.parse(localStorage.getItem("legislators"));
			var pos = 0;      // find the element to be removed
			for (var i = 0; i < a.length; i++)
				if (a[i].bioguide_id == x.bioguide_id)
					pos = i;
			a.splice(pos, 1);
			localStorage.setItem("legislators", JSON.stringify(a));
			localStorage.setItem(x.bioguide_id, "no");  // set localStorage Value;
			$scope.F1 = JSON.parse(localStorage.getItem("legislators"));
//			alert("after del1: " + localStorage.getItem("legislators"));
		};
		this.setBillsElement = function(ele) {
			$scope.billsElement = ele;
			var start = $scope.billsElement.introduced_on.split("-");
			$scope.billsElement.date_intro = new Date(start[0], start[1], start[2]);
//			var n = Date.now();
//			$scope.element.progress = parseInt((n - $scope.element.date_term_start.getTime()) / ($scope.element.date_term_end.getTime() - $scope.element.date_term_start.getTime()) * 100);
//			alert("state: " +ele.bioguide_id + " : " +  localStorage.getItem(ele.bioguide_id));
			if(localStorage.getItem(ele.bill_id) && localStorage.getItem(ele.bill_id) == "yes")
				$scope.billsElement.isFavorite = "yes";
			else
				$scope.billsElement.isFavorite = "no";
		};
		this.clickEmpty2 = function(x) {
			x.isFavorite = "yes";
			var a = JSON.parse(localStorage.getItem("bills"));
			a.push(x);
			localStorage.setItem("bills", JSON.stringify(a));
			localStorage.setItem(x.bill_id, "yes");
		};
		this.clickFull2 = function(x) {
			x.isFavorite = "no";
			var a = JSON.parse(localStorage.getItem("bills"));
			var pos = 0;      // find the element to be removed
			for (var i = 0; i < a.length; i++)
				if (a[i].bill_id == x.bill_id)
					pos = i;
			a.splice(pos, 1);
			localStorage.setItem("bills", JSON.stringify(a));
			localStorage.setItem(x.bill_id, "no");
		};
		this.del2 = function(x) {
			x.isFavorite = "no";
			var a = JSON.parse(localStorage.getItem("bills"));
			var pos = 0;      // find the element to be removed
			for (var i = 0; i < a.length; i++)
				if (a[i].bill_id == x.bill_id)
					pos = i;
			a.splice(pos, 1);
			localStorage.setItem("bills", JSON.stringify(a));
			localStorage.setItem(x.bill_id, "no");
			$scope.F2 = JSON.parse(localStorage.getItem("bills"));
		};
		
		this.setCom = function(ele) {
//			$scope.comEle = ele;
//			var start = $scope.comEle.split("-");
//			$scope..date_intro = new Date(start[0], start[1], start[2]);
//			var n = Date.now();
//			$scope.element.progress = parseInt((n - $scope.element.date_term_start.getTime()) / ($scope.element.date_term_end.getTime() - $scope.element.date_term_start.getTime()) * 100);
//			alert("state: " +ele.bioguide_id + " : " +  localStorage.getItem(ele.bioguide_id));
			if(localStorage.getItem(ele.committee_id) && localStorage.getItem(ele.committee_id) == "yes")
				ele.isFavorite = "yes";
			else
				ele.isFavorite = "no";
		};
		this.clickEmpty3 = function(x) {
			x.isFavorite = "yes";
			var a = JSON.parse(localStorage.getItem("coms"));
			a.push(x);
			localStorage.setItem("coms", JSON.stringify(a));
			localStorage.setItem(x.committee_id, "yes");
		};
		this.del3 = function(x) {
			x.isFavorite = "no";
			var a = JSON.parse(localStorage.getItem("coms"));
			var pos = 0;      // find the element to be removed
			for (var i = 0; i < a.length; i++)
				if (a[i].committee_id == x.committee_id)
					pos = i;
			a.splice(pos, 1);
			localStorage.setItem("coms", JSON.stringify(a));
			localStorage.setItem(x.committee_id, "no");
			$scope.F3 = JSON.parse(localStorage.getItem("coms"));
		};
		this.clickFull3 = function(x) {
			x.isFavorite = "no";
			var a = JSON.parse(localStorage.getItem("coms"));
			var pos = 0;      // find the element to be removed
			for (var i = 0; i < a.length; i++)
				if (a[i].committee_id == x.committee_id)
					pos = i;
			a.splice(pos, 1);
			localStorage.setItem("coms", JSON.stringify(a));
			localStorage.setItem(x.committee_id, "no");
		};
		$http({
			method: 'GET',
			url: 'congress.php?id=1'
			}).then(function successCallback(response) {
				$scope.legislators = response.data.results;  //return the object
				$scope.senate = [];
				$scope.house = [];
				for (var i = 0; i < $scope.legislators.length; i++) {
					var legi = $scope.legislators[i];
					if (legi.district == null)
						legi.district = "N.A.";
					else
						legi.district = "District " + legi.district;
	//				alert(legi.district);
					if(legi.party == "R")
						legi.url = "http://cs-server.usc.edu:45678/hw/hw8/images/r.png";
					else if (legi.party == "D")
						legi.url = "http://cs-server.usc.edu:45678/hw/hw8/images/d.png";
	//				alert(legi.url);
					if (legi.chamber == "senate")
					{
						legi.chamber = "Senate";
						legi.chamberUrl = "http://cs-server.usc.edu:45678/hw/hw8/images/s.svg";
						$scope.senate.push(legi);
					}
					else if (legi.chamber == "house")
					{
						legi.chamber = "House";
						legi.chamberUrl = "http://cs-server.usc.edu:45678/hw/hw8/images/h.png";
						$scope.house.push(legi);
					}
				}
		}, function errorCallback(response) {
			alert("ERROR!");
		});
		$http({
			method: 'GET',
			url: 'congress.php?id=5'
			}).then(function successCallback(response) {
				$scope.bills = response.data.results;
	//				localStorage.setItem('bills', response.data);
			}, function errorCallback(response) {
				alert("ERROR!");
			});
		$http({
			method: 'GET',
			url: 'congress.php?id=6'
			//https://congress.api.sunlightfoundation.com
		}).then(function successCallback(response) {
			$scope.newBills = response.data.results;
	//				localStorage.setItem('bills', response.data);
		}, function errorCallback(response) {
			alert("ERROR!");
		});
			$http({
				method: 'GET',
				url: 'congress.php?id=3'
				//https://congress.api.sunlightfoundation.com
			}).then(function successCallback(response) {
				$scope.committees = response.data.results;
				$scope.comH = [];
				$scope.comS = [];
				$scope.comJ = [];
				for (var i = 0; i < $scope.committees.length; i++) {
					if ($scope.committees[i].chamber == "senate")
						$scope.comS.push($scope.committees[i]);
					else if ($scope.committees[i].chamber == "house")
						$scope.comH.push($scope.committees[i]);
					else
						$scope.comJ.push($scope.committees[i]);
				}
//				alert($scope.comS.length);
//					alert($scope.comH.length);
//				alert($scope.comJ.length);
			}, function errorCallback(response) {
				alert("ERROR!");
			});
	});

})();
