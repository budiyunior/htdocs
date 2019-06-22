package com.example.customshirt.Rest;

import com.example.customshirt.Model.Item.GetItem;
import com.example.customshirt.Model.Keranjang.GetKeranjang;
import com.example.customshirt.Model.User.PostPutDelUser;
import com.example.customshirt.Model.User.ResponseLogin;

import retrofit2.Call;
import retrofit2.http.Field;
import retrofit2.http.FormUrlEncoded;
import retrofit2.http.GET;
import retrofit2.http.POST;
import retrofit2.http.PUT;

public interface ApiInterface {


    @FormUrlEncoded
    @POST("api/logintest")
    Call<ResponseLogin> login(@Field("email") String email,
                              @Field("password") String password
    );

    @GET("api/item")
    Call<GetItem> getItem();

    @FormUrlEncoded
    @POST("api/users")
    Call<PostPutDelUser> postUser(
                                  @Field("nama_pengguna") String nama_pengguna,
                                  @Field("id_akses") String id_akses,
                                  @Field("tanggal_lahir") String tanggal_lahir,
                                  @Field("email") String email,
                                  @Field("password") String password,
                                  @Field("nomor_telp") String nomor_telp);

    @FormUrlEncoded
    @PUT("api/users")
    Call<PostPutDelUser> putUser(@Field("id_pengguna") String id_pengguna,
                                 @Field("nama_pengguna") String nama_pengguna,
                                 @Field("tanggal_lahir") String tanggal_lahir,
                                 @Field("email") String email,
                                 @Field("password") String password,
                                 @Field("nomor_telp") String nomor_telp);

    @GET("api/keranjang")
    Call<GetKeranjang> getKeranjang();


}
