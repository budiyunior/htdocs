package com.example.customshirt;

import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import com.example.customshirt.Model.PostPutDelItem;
import com.example.customshirt.Rest.ApiClient;
import com.example.customshirt.Rest.ApiInterface;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class EditActivity extends AppCompatActivity {
    EditText edtId_jenis_item, edtNama_jenis;
    Button btUpdate, btDelete, btBack;
    ApiInterface mApiInterface;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_edit);
        edtId_jenis_item = (EditText) findViewById(R.id.edtId_jenis_item);
        edtNama_jenis = (EditText) findViewById(R.id.edtNama_jenis);
        Intent mIntent = getIntent();
        edtId_jenis_item.setText(mIntent.getStringExtra("Id"));
        edtId_jenis_item.setTag(edtId_jenis_item.getKeyListener());
        edtId_jenis_item.setKeyListener(null);
        edtNama_jenis.setText(mIntent.getStringExtra("Nama"));
        mApiInterface = ApiClient.getClient().create(ApiInterface.class);
        btUpdate = (Button) findViewById(R.id.btUpdate2);
        btUpdate.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Call<PostPutDelItem> updateItemCall = mApiInterface.putItem(
                        edtId_jenis_item.getText().toString(),
                        edtNama_jenis.getText().toString());
                updateItemCall.enqueue(new Callback<PostPutDelItem>() {
                    @Override
                    public void onResponse(Call<PostPutDelItem> call, Response<PostPutDelItem> response) {
                        MainActivity.ma.refresh();
                        finish();
                    }

                    @Override
                    public void onFailure(Call<PostPutDelItem> call, Throwable t) {
                        Toast.makeText(getApplicationContext(), "Error", Toast.LENGTH_LONG).show();
                    }
                });
            }
        });
        btDelete = (Button) findViewById(R.id.btDelete2);
        btDelete.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                if (edtId_jenis_item.getText().toString().trim().isEmpty()==false){
                    Call<PostPutDelItem> deleteItem = mApiInterface.deleteItem(edtId_jenis_item.getText().toString());
                    deleteItem.enqueue(new Callback<PostPutDelItem>() {
                        @Override
                        public void onResponse(Call<PostPutDelItem> call, Response<PostPutDelItem> response) {
                            MainActivity.ma.refresh();
                            finish();
                        }

                        @Override
                        public void onFailure(Call<PostPutDelItem> call, Throwable t) {
                            Toast.makeText(getApplicationContext(), "Error", Toast.LENGTH_LONG).show();
                        }
                    });
                }else{
                    Toast.makeText(getApplicationContext(), "Error", Toast.LENGTH_LONG).show();
                }
            }
        });
        btBack = (Button) findViewById(R.id.btBackGo);
        btBack.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                MainActivity.ma.refresh();
                finish();
            }
        });
    }
}
