package com.example.customshirt.Model.AlamatPengguna;

import com.google.gson.annotations.SerializedName;
import java.util.List;

public class GetAlamatPengguna {

        @SerializedName("status")
        Boolean status;

        @SerializedName("message")
        String message;

        @SerializedName("id_pengguna")
        String id_pengguna;

        @SerializedName("result")
        List<AlamatPengguna> listDataAlamatPengguna;

        public Boolean getStatus() {
            return status;
        }

        public void setStatus(Boolean status) {
            this.status = status;
        }

        public String getMessage() {
            return message;
        }

        public void setMessage(String message) {
            this.message = message;
        }

        public String getId_pengguna() {
            return id_pengguna;
        }

        public void setId_pengguna(String id_pengguna) {
            this.id_pengguna = id_pengguna;
        }


        public List<AlamatPengguna> getListDataAlamatPengguna() {
            return listDataAlamatPengguna;
        }

        public void setListDataAlamatPengguna(List<AlamatPengguna> listDataAlamatPengguna) {
            this.listDataAlamatPengguna = listDataAlamatPengguna;

        }
    }


