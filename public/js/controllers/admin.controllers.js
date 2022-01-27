angular.module('adminctrl', [])
    // Admin
    .controller('dashboardController', dashboardController)
    .controller('biodataController', biodataController)
    .controller('formController', formController)
    .controller('daftarController', daftarController)

    ;
// Anggota

function dashboardController($scope, helperServices, dashboardServices, message, $sce) {
    $scope.$emit("SendUp", "Pembobotan Faktor");
    $scope.datas = {};
    $scope.title = "Penilaian Faktor";
    $scope.model = {};
    $scope.button1 = true;
    $scope.head = ""
    $scope.data = [];
    $scope.penilaian = false;
    $scope.saaty = [{ nilai1: 0.5, nilai2: 2 }, { nilai1: 0.333333, nilai2: 3 }, { nilai1: 0.25, nilai2: 4 }, { nilai1: 0.2, nilai2: 5 }, { nilai1: 0.166666666, nilai2: 6 }, { nilai1: 0.14286, nilai2: 7 }, { nilai1: 0.125, nilai2: 8 }, { nilai1: 0.1111111111, nilai2: 9 }];
    dashboardServices.get().then(res => {
        $scope.datas = res;
        $scope.datas.pembobotan[0].nilai.forEach(element => {
            if (parseFloat(element.idfaktor) == parseFloat(element.idfaktor1)) {
                element.bobot = parseFloat(element.bobot)
                data.push(angular.copy(element));
            } else if (parseFloat(element.idfaktor) > parseFloat(element.idfaktor1)) {
                data.push(angular.copy(element));
                element.array = [];
                element.array.push(parseFloat(element.bobot));
                tem.push(element);
            } else {

                data.push(element);
            }
        });

        tem.forEach(set => {
            $scope.datas.pembobotan.forEach((user, key1) => {
                if (key1 > 0) {
                    user.nilai.forEach((element, key2) => {
                        if (set.idfaktor == element.idfaktor && set.idfaktor1 == element.idfaktor1) {
                            set.array.push(parseFloat(element.bobot));
                        }
                    });
                }
            });
            set.geomean = $scope.geometric_average(set.array)
            var cari = data.find(x => x.idfaktor == set.idfaktor && x.idfaktor1 == set.idfaktor1);
            var cari1 = data.find(x => x.idfaktor == set.idfaktor1 && x.idfaktor1 == set.idfaktor);
            if (set.geomean < 1) {
                var setNilai = $scope.findMinus($scope.saaty, set.geomean);
                cari.bobot = setNilai.nilai1;
                cari1.bobot = setNilai.nilai2;
                set.bobot = setNilai.nilai1;
                set.bobot = setNilai.nilai2;
            } else {
                var setNilai = $scope.findPlus($scope.saaty, set.geomean);
                cari.bobot = setNilai.nilai2;
                cari1.bobot = setNilai.nilai1;
                set.bobot = setNilai.nilai2;
                set.bobot = setNilai.nilai1;
            }
        });

        $scope.datas.faktor.forEach(faktor => {
            faktor.tem = [];
            faktor.data = [];
            faktor.pembobotanAlt1[0].nilai.forEach(element => {
                if (parseFloat(element.id_alt) == parseFloat(element.id_alt1)) {
                    element.bobot = parseFloat(element.bobot)
                    faktor.data.push(angular.copy(element));
                } else if (parseFloat(element.id_alt) > parseFloat(element.id_alt1)) {
                    faktor.data.push(angular.copy(element));
                    element.array = [];
                    element.array.push(parseFloat(element.bobot));
                    faktor.tem.push(element);
                } else {
                    faktor.data.push(element);
                }
            });
            faktor.tem.forEach(set => {
                faktor.pembobotanAlt1.forEach((user, key1) => {
                    if (key1 > 0) {
                        user.nilai.forEach((element, key2) => {
                            if (set.id_alt == element.id_alt && set.id_alt1 == element.id_alt1) {
                                set.array.push(parseFloat(element.bobot));
                            }
                        });
                    }
                });
                set.geomean = $scope.geometric_average(set.array)
                var cari = faktor.data.find(x => x.id_alt == set.id_alt && x.id_alt1 == set.id_alt1);
                var cari1 = faktor.data.find(x => x.id_alt == set.id_alt1 && x.id_alt1 == set.id_alt);
                if (set.geomean < 1) {
                    var setNilai = $scope.findMinus($scope.saaty, set.geomean);
                    cari.bobot = setNilai.nilai1;
                    cari1.bobot = setNilai.nilai2;
                    set.bobot = setNilai.nilai1;
                    set.bobot = setNilai.nilai2;
                } else {
                    var setNilai = $scope.findPlus($scope.saaty, set.geomean);
                    cari.bobot = setNilai.nilai2;
                    cari1.bobot = setNilai.nilai1;
                    set.bobot = setNilai.nilai2;
                    set.bobot = setNilai.nilai1;
                }
            });
        });

        $scope.datas.alt1.forEach(alt => {
            alt.tem = [];
            alt.data = [];
            alt.pembobotanAlt2[0].nilai.forEach(element => {
                if (parseFloat(element.id_alt) == parseFloat(element.id_alt1)) {
                    element.bobot = parseFloat(element.bobot)
                    alt.data.push(angular.copy(element));
                } else if (parseFloat(element.id_alt) > parseFloat(element.id_alt1)) {
                    alt.data.push(angular.copy(element));
                    element.array = [];
                    element.array.push(parseFloat(element.bobot));
                    alt.tem.push(element);
                } else {
                    alt.data.push(element);
                }
            });
            alt.tem.forEach(set => {
                alt.pembobotanAlt2.forEach((user, key1) => {
                    if (key1 > 0) {
                        user.nilai.forEach((element, key2) => {
                            if (set.id_alt == element.id_alt && set.id_alt1 == element.id_alt1) {
                                set.array.push(parseFloat(element.bobot));
                            }
                        });
                    }
                });
                set.geomean = $scope.geometric_average(set.array)
                var cari = alt.data.find(x => x.id_alt == set.id_alt && x.id_alt1 == set.id_alt1);
                var cari1 = alt.data.find(x => x.id_alt == set.id_alt1 && x.id_alt1 == set.id_alt);
                if (set.geomean < 1) {
                    var setNilai = $scope.findMinus($scope.saaty, set.geomean);
                    cari.bobot = setNilai.nilai1;
                    cari1.bobot = setNilai.nilai2;
                    set.bobot = setNilai.nilai1;
                    set.bobot = setNilai.nilai2;
                } else {
                    var setNilai = $scope.findPlus($scope.saaty, set.geomean);
                    cari.bobot = setNilai.nilai2;
                    cari1.bobot = setNilai.nilai1;
                    set.bobot = setNilai.nilai2;
                    set.bobot = setNilai.nilai1;
                }
            });
        });
        $scope.priorityLocal($scope.datas.faktor);
        $scope.priorityLocal($scope.datas.alt1);

        // console.log(tem);
        // console.log(data);
        console.log($scope.datas);
    })

    $scope.priorityLocal = (dataAlt) => {
        dataAlt.forEach((value1, key1) => {
            value1.sumBobot = [];
            value1.priority = [];
            value1.sumWeight = [];
            var mulai = value1.data[0].id_alt == '1' ? 1 : 4;
            for (let index1 = 0; index1 < value1.jumlahAlt; index1++) {
                for (let index2 = 0; index2 < value1.jumlahAlt; index2++) {
                    var item = value1.data.find(x => x.id_alt == index1 + mulai && x.id_alt1 == index2 + mulai);
                    if (item) {
                        if (value1.sumBobot[index2]) {
                            value1.sumBobot[index2] += parseFloat(item.bobot);
                        } else {
                            value1.sumBobot[index2] = parseFloat(item.bobot);
                        }
                    }
                }
            }
            for (let index1 = 0; index1 < value1.jumlahAlt; index1++) {
                for (let index2 = 0; index2 < value1.jumlahAlt; index2++) {
                    var item = value1.data.find(x => x.id_alt == index1 + mulai && x.id_alt1 == index2 + mulai);
                    if (item) {
                        item.normal = item.bobot / value1.sumBobot[index2];
                        if (value1.priority[parseInt(index1)]) {
                            value1.priority[parseInt(index1)] += parseFloat(item.normal);
                        } else {
                            value1.priority[parseInt(index1)] = parseFloat(item.normal);
                        }
                    }
                }
            }
            value1.priority.forEach((element, key) => {
                value1.priority[key] = element / value1.jumlahAlt;
            });
            if (value1.jumlahAlt > 2) {
                for (let index1 = 0; index1 < value1.jumlahAlt; index1++) {
                    for (let index2 = 0; index2 < value1.jumlahAlt; index2++) {
                        var item = value1.data.find(x => x.id_alt == index1 + mulai && x.id_alt1 == index2 + mulai);
                        if (item) {
                            item.terbobot = item.bobot * (value1.priority[index2]);
                            if (value1.sumWeight[parseInt(index1)]) {
                                value1.sumWeight[parseInt(index1)] += parseFloat(item.terbobot);
                            } else {
                                value1.sumWeight[parseInt(index1)] = parseFloat(item.terbobot);
                            }
                        }
                    }
                }
                var total = 0;
                value1.sumWeight.forEach((sum, key1) => {
                    value1.priority.forEach((prio, key2) => {
                        if (key1 == key2) {
                            total += (value1.sumWeight[key1] / value1.priority[key2])
                        }
                    });
                });
                value1.ci = ((total / value1.jumlahAlt) - value1.jumlahAlt) / (value1.jumlahAlt - 1);
                value1.ri = helperServices.ri.find(x => x.n == value1.jumlahAlt).ri;
                value1.cr = value1.ci / value1.ri;
            }
        });
    }

    $scope.showNilai = (item, in1, in2) => {
        return item.find(x => x.id_alt == in1 && x.id_alt1 == in2).bobot;
    }


    $scope.sumBobot = [];
    $scope.priority = [];
    var i = 0
    $scope.getNilaii = (index1, index2) => {
        var item = data.find(x => x.idfaktor == index1 && x.idfaktor1 == index2);
        if (item) {
            if (i < data.length) {
                if ($scope.sumBobot[index2 - 1]) {
                    $scope.sumBobot[index2 - 1] += parseFloat(item.bobot);
                } else {
                    $scope.sumBobot[index2 - 1] = parseFloat(item.bobot);
                }
                // priority
                i++;
            }
            return item.bobot;
        }
    }
    var p = 0;
    $scope.getGeomean = (index1, index2) => {
        var item = data.find(x => x.idfaktor == index1 && x.idfaktor1 == index2);
        item.normal = item.bobot / $scope.sumBobot[index2 - 1];
        if (p < data.length) {
            if ($scope.priority[parseInt(index1) - 1]) {
                $scope.priority[parseInt(index1) - 1] += parseFloat(item.normal);
            } else {
                $scope.priority[parseInt(index1) - 1] = parseFloat(item.normal);
            }
            p++;
        }
        return item.normal;
    }


    $scope.sumWeight = [];
    var w = 0;
    $scope.setTerbobot = (index1, index2) => {
        var item = data.find(x => x.idfaktor == index1 && x.idfaktor1 == index2);
        if (item) {
            item.terbobot = item.bobot * ($scope.priority[index2 - 1] / $scope.datas.faktor.length);
            if (w < data.length) {
                if ($scope.sumWeight[parseInt(index1) - 1]) {
                    $scope.sumWeight[parseInt(index1) - 1] += parseFloat(item.terbobot);
                } else {
                    $scope.sumWeight[parseInt(index1) - 1] = parseFloat(item.terbobot);
                }
                w++;
            }
            return item.terbobot;

        }
    }

    $scope.consistensiFaktor = () => {
        var total = 0;
        if (w == data.length) {
            $scope.sumWeight.forEach((sum, key1) => {
                $scope.priority.forEach((prio, key2) => {
                    if (key1 == key2) {
                        total += ($scope.sumWeight[key1] / $scope.priority[key2])
                    }
                });
            });
            var ci = (total - $scope.datas.faktor.length) / ($scope.datas.faktor.length - 1);
            var ri = helperServices.ri.find(x => x.n == $scope.datas.faktor.length).ri;
            return ci / ri;
        }
    }


    var tem = [];
    var data = [];


    $scope.findMinus = (arr, num) => {
        if (arr == null) {
            return
        }

        return arr.reduce((prev, current) => Math.abs(current.nilai1 - num) < Math.abs(prev.nilai1 - num) ? current : prev);
    }
    $scope.findPlus = (arr, num) => {
        if (arr == null) {
            return
        }

        return arr.reduce((prev, current) => Math.abs(current.nilai2 - num) < Math.abs(prev.nilai2 - num) ? current : prev);
    }


    $scope.setNilai = (item, nilai) => {
        if (nilai == "1") {
            var set = $scope.tem.find(x => x.idfaktor == item.idfaktor && x.idfaktor1 == item.idfaktor1);
            var set1 = $scope.tem.find(x => x.idfaktor == item.idfaktor1 && x.idfaktor1 == item.idfaktor);
            set.bobot = item.bobot.length > 1 ? Math.abs(parseFloat(item.bobot)) : parseFloat(item.bobot);
            set1.bobot = item.bobot.length > 1 ? 1 / Math.abs(parseFloat(item.bobot)) : 1 / parseFloat(item.bobot);
        } else {
            var set = $scope.tem.find(x => x.idfaktor == item.idfaktor1 && x.idfaktor1 == item.idfaktor);
            var set1 = $scope.tem.find(x => x.idfaktor == item.idfaktor && x.idfaktor1 == item.idfaktor1);
            set.bobot = item.bobot;
            set1.bobot = parseFloat(1 / item.bobot);
        }
        console.log($scope.tem);
    }

    $scope.save = () => {
        dashboardServices.post($scope.tem).then(res => {
            $scope.penilaian = false;
            message.info("Data Penilaian Faktor telah dilakukan!", "Ya");
        })
    }

    $scope.geometric_average = (a) => {
        var mul;
        a.forEach((n, i) => {
            mul = i == 0 ? n : mul * n;
        });
        return Math.pow(mul, 1 / a.length);
    }
}
function biodataController($scope, helperServices, biodataServices, message, $sce) {
    $scope.$emit("SendUp", "Pembobotan Faktor");
    $scope.datas = {};
    $scope.title = "Biodata Anggota";
    $scope.model = {};
    $scope.button1 = true;
    $scope.head = ""
    $scope.data = [];
    $scope.penilaian = false;
}
function formController($scope, helperServices, biodataServices, message, $sce, $window, $state, $http) {
    $scope.$emit("SendUp", "Pembobotan Faktor");
    $scope.datas = {};
    $scope.title = "Biodata Anggota";
    $scope.model = {};
    $scope.model = {};
    $scope.button1 = true;
    $scope.head = ""
    $scope.data = [];
    $scope.penilaian = false;
    $scope.formData = {};
    
    $.LoadingOverlay("show");
    biodataServices.get().then(res => {
        $scope.datas = res;
        console.log(res);
        if (res.jenis_kelamin) {
            var foto = $scope.datas.upload_foto3x4.split('.');
            $scope.datas.fotoext = foto[1];
            var ijazah = $scope.datas.upload_ijazah.split('.');
            $scope.datas.ijazahext = ijazah[1];
            var ktp = $scope.datas.upload_ktp.split('.');
            $scope.datas.ktpext = ktp[1];
            $scope.formData = res;
            $scope.formData.tanggal_lahir = new Date($scope.formData.tanggal_lahir);
            // $state.go('data');
            console.log($scope.datas.berkas);
        } else {
            if (window.localStorage.getItem('biodata')) {
                $scope.formData = JSON.parse(window.localStorage.getItem('biodata'));
                $scope.formData.tanggal_lahir = new Date($scope.formData.tanggal_lahir);
            }else{
                $scope.formData = res;
            }
        }
        $.LoadingOverlay("hide");
    })

    // function to process the form
    $scope.processForm = function () {
        message.dialog("Ingin menyimpan data?", "Ya", "Tidak").then(x => {
            $.LoadingOverlay("show");
            biodataServices.put($scope.formData).then(res => {
                message.success("Proses Berhasil");
                window.localStorage.removeItem('biodata');
                $scope.datas = res;
                $.LoadingOverlay("hide");
                $state.go('data');
            })
        })
    };


    $scope.formatNpwp = (value) => {
        var last = angular.copy(value);
        value = value.replace(/[^\w\s]/gi, '');
        var a;
        if (value.length == 3) {
            a = value.replace(/(\d{2})/, '$1.');
        } else if (value.length == 6) {
            a = value.replace(/(\d{2})(\d{3})/, '$1.$2.');
        } else if (value.length == 9) {
            a = value.replace(/(\d{2})(\d{3})(\d{3})/, '$1.$2.$3.');
        } else if (value.length == 10) {
            a = value.replace(/(\d{2})(\d{3})(\d{3})(\d{1})/, '$1.$2.$3.$4-');
        } else if (value.length == 13) {
            a = value.replace(/(\d{2})(\d{3})(\d{3})(\d{1})(\d{3})/, '$1.$2.$3.$4-$5.');
        } else if (value.length == 15) {
            a = value.replace(/(\d{2})(\d{3})(\d{3})(\d{1})(\d{3})(\d{3})/, '$1.$2.$3.$4-$5.$6');
        } else {
            a = last;
        }
        $scope.formData.npwp = a;
    }

    $scope.file = [];
    $scope.check = (item) => {
        console.log(item);
        $scope.$applyAsync(x => {
            for (let index = 0; index < 10; index++) {
                $scope.file.push(index);

            }
        })
    }

    $scope.open = (item) => {
        if (item.filetype == "application/pdf") {
            let pdfWindow = window.open("")
            pdfWindow.document.write(
                "<iframe width='100%' height='100%' src='data:application/pdf;base64, " +
                encodeURI(item.base64) + "'></iframe>"
            )
        } else {
            var image = new Image();
            image.src = "data:" + item.filetype + ";base64," + item.base64;

            var w = window.open("");
            w.document.write(image.outerHTML);
        }

    }

    $scope.next = (item) => {
        window.localStorage.setItem('biodata', JSON.stringify($scope.formData));
    }

    $scope.open1 = (item) => {
        if (item.ext == 'pdf') {
            $http.get(helperServices.url + 'template/img/berkas/' + item.file, { responseType: 'arraybuffer' }).then(function (response) {
                var file = new Blob([response.data], { type: 'application/pdf' });
                file.name = item.file;
                var fileUrl = URL.createObjectURL(file);
                $window.open(fileUrl, '_blank');
            });
        } else {
            let image = new Image();
            image.src = helperServices.url + "template/img/berkas/" + item.file;

            var w = window.open("");
            w.document.write(image.outerHTML);
        }

    }
}

function daftarController($scope, helperServices, daftarServices, message, $sce) {
    $scope.$emit("SendUp", "Pembobotan Faktor");
    $scope.datas = [];
    $scope.title = "Biodata Anggota";
    $scope.model = {};
    $scope.button1 = true;
    $scope.head = ""
    $scope.data = [];
    $scope.penilaian = false;
    $.LoadingOverlay("show");
    daftarServices.get().then(res=>{
        $scope.datas = res;
        console.log(res);
        $.LoadingOverlay("hide");
        $.LoadingOverlay("hide");
    });
    $scope.save = ()=>{
        message.dialog("Ingin melakukan pendaftaran?", "Ya", "Tidak").then(x=>{
            $.LoadingOverlay("show");
            daftarServices.post($scope.model).then(res=>{
                $("#exampleModal").modal('hide');
                $scope.model = {};
                $.LoadingOverlay("hide");
                $scope.datas = res;
                message.success('Berhasil', "OK");
            })
        })
    }
}