package com.example.customshirt;

import android.content.Context;
import android.content.Intent;
import android.graphics.Color;
import android.graphics.drawable.ColorDrawable;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.DisplayMetrics;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;

import com.example.customshirt.Model.Desain.PostPutDelDesainPengguna;
import com.example.customshirt.Rest.ApiClient;
import com.example.customshirt.Rest.ApiInterface;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class PopupDeleteCart extends AppCompatActivity {

    TextView tv_id;
Button btn_hapus;
    ApiInterface mApiInterface;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_popup_delete_cart);


        DisplayMetrics dm = new DisplayMetrics();
        getWindowManager().getDefaultDisplay().getMetrics(dm);
//        getWindow().setBackgroundDrawable(new ColorDrawable(Color.TRANSPARENT));
        tv_id = (TextView) findViewById(R.id.tv_id);
        Intent mIntent = getIntent();
        tv_id.setText(mIntent.getStringExtra("id_desain"));
        int width = dm.widthPixels;
        int height = dm.heightPixels;
        mApiInterface = ApiClient.getClient().create(ApiInterface.class);
        getWindow().setLayout((int) (width * .5), (int) (height * .1));
btn_hapus = (Button) findViewById(R.id.btn_hapus);
        btn_hapus.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                if (tv_id.getText().toString().trim().isEmpty()==false){
                    Call<PostPutDelDesainPengguna> deleteKontak = mApiInterface.deleteDesainPengguna(tv_id.getText().toString());
                    deleteKontak.enqueue(new Callback<PostPutDelDesainPengguna>() {
                        @Override
                        public void onResponse(Call<PostPutDelDesainPengguna> call, Response<PostPutDelDesainPengguna> response) {
                            KeranjangFragment.kf.showcart();
                            finish();
                        }

                        @Override
                        public void onFailure(Call<PostPutDelDesainPengguna> call, Throwable t) {
                            Toast.makeText(getApplicationContext(), "Error", Toast.LENGTH_LONG).show();
                        }
                    });
                }else{
                    Toast.makeText(getApplicationContext(), "Error", Toast.LENGTH_LONG).show();
                }
            }
        });

    }

    public void ada(View view) {
    }
}
