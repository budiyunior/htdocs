package com.example.customshirt.Rest;

import com.example.customshirt.Model.GetKontak;
import com.example.customshirt.Model.mahasiswa.GetMahasiswa;
import com.example.customshirt.Model.PostPutDelKontak;

import retrofit2.Call;
import retrofit2.http.Field;
import retrofit2.http.FormUrlEncoded;
import retrofit2.http.GET;
import retrofit2.http.HTTP;
import retrofit2.http.POST;
import retrofit2.http.PUT;

public interface ApiInterface {
    @GET("kontak_android")
    Call<GetKontak> getKontak();
    @FormUrlEncoded
    @POST("kontak_android")
    Call<PostPutDelKontak> postKontak(@Field("nama") String nama,
                                      @Field("nomor") String nomor);
    @FormUrlEncoded
    @PUT("kontak_android")
    Call<PostPutDelKontak> putKontak(@Field("id") String id,
                                     @Field("nama") String nama,
                                     @Field("nomor") String nomor);
    @FormUrlEncoded
    @HTTP(method = "DELETE", path = "kontak_android", hasBody = true)
    Call<PostPutDelKontak> deleteKontak(@Field("id") String id);

    @GET("mahasiswa")
    Call<GetMahasiswa> getMahaiswa();
}
