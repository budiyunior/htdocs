package com.example.customshirt.Rest;

import retrofit2.Retrofit;
import retrofit2.converter.gson.GsonConverterFactory;
import okhttp3.Interceptor;
import okhttp3.OkHttpClient;
import okhttp3.Request;
import okhttp3.Response;

public class ApiClient {
<<<<<<< HEAD
    public static final String BASE_URL = "http://192.168.1.16/adigagas/index.php/";
    public static final String URL_ROOT_HTTPS = "https://api.rajaongkir.com/starter/";

=======
    public static final String BASE_URL = "http://192.168.1.6/adigagas/index.php/";
>>>>>>> 00c54d9e7c6c18a905e0f3d5f8780c748fa2bc59
    private static Retrofit retrofit = null;

    public static Retrofit getClient() {
        if (retrofit==null) {
            retrofit = new Retrofit.Builder()
                    .baseUrl(BASE_URL)
                    .addConverterFactory(GsonConverterFactory.create())
                    .build();
        }
        return retrofit;
    }


//    public static ApiInterface getApi() {
//        //Builder Retrofit
//        Retrofit retrofit = new Retrofit.Builder()
//                .baseUrl(BASE_URL)
//                .addConverterFactory(GsonConverterFactory.create())
//                .build();
//
//        ApiInterface apiService = retrofit.create(ApiInterface.class);
//
//        return apiService;
//    }
}