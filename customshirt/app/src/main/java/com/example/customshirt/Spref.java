package com.example.customshirt;

import android.content.Context;
import android.content.SharedPreferences;

public class Spref {
    public static final String SP_id_pengguna="spid_pengguna";
    public static final String SP_nama_pengguna="spnama_pengguna";
    public static final String SP_email="spemail";
    public static final String SP_tanggal_lahir="sptanggal_lahir";
    public static final String SP_password="sppassword";
    public static final String SP_id_akses="spid_akses";
    public static final String SP_nomor_telp="spnomor_telp";
    public static final String SP_id_cart="spid_cart";


    public static final String SP_Sukses_Login = "spSuksesLogin";

    SharedPreferences sp;
    SharedPreferences.Editor spEditor;

    public Spref(Context context){
        sp = context.getSharedPreferences(SP_id_pengguna, Context.MODE_PRIVATE);
        spEditor = sp.edit();
    }

    public void saveSPString(String keySP, String value){
        spEditor.putString(keySP, value);
        spEditor.commit();
    }

    public void saveSPInt(String keySP, int value){
        spEditor.putInt(keySP, value);
        spEditor.commit();
    }

    public void saveSPBoolean(String keySP, boolean value){
        spEditor.putBoolean(keySP, value);
        spEditor.commit();
    }

    public  String getSP_id_pengguna() {
        return sp.getString(SP_id_pengguna,"");
    }

    public  String getSP_nama_pengguna() {
        return SP_nama_pengguna;
    }

    public String getSP_email() {
        return sp.getString(SP_email,"");
    }

    public  String getSP_tanggal_lahir() {
        return sp.getString(SP_tanggal_lahir,"");
    }

    public  String getSP_password() {
        return sp.getString(SP_password,"");
    }

    public  String getSP_id_akses() {
        return sp.getString(SP_id_akses,"");
    }

    public String getSP_id_cart() {
        return sp.getString(SP_id_cart,"");
    }

    public Boolean getSP_Sukses_Login() {
        return sp.getBoolean(SP_Sukses_Login,false);
    }
}
