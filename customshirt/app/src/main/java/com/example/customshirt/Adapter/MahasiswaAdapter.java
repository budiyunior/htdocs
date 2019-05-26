package com.example.customshirt.Adapter;

import android.content.Intent;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

import com.example.customshirt.Adapter.MahasiswaAdapter;


import com.example.customshirt.EditActivity;
import com.example.customshirt.Model.Kontak;
import com.example.customshirt.Model.mahasiswa.Mahasiswa;
import com.example.customshirt.R;

import java.util.List;


public class MahasiswaAdapter extends RecyclerView.Adapter<MahasiswaAdapter.MyViewHolder>{
    List<Mahasiswa> mMahasiswaList;

    public  MahasiswaAdapter(List <Mahasiswa> MahasiswaList) {
        mMahasiswaList = MahasiswaList;
    }

    @Override
    public MyViewHolder onCreateViewHolder (ViewGroup parent,int viewType){
        View mView = LayoutInflater.from(parent.getContext()).inflate(R.layout.mahasiswa_list, parent, false);
        MyViewHolder mViewHolder = new MyViewHolder(mView);
        return mViewHolder;
    }

    @Override
    public void onBindViewHolder (MyViewHolder holder,final int position){
        holder.mTextViewId.setText("Id = " + mMahasiswaList.get(position).getId());
        holder.mTextViewNama.setText("Nama = " + mMahasiswaList.get(position).getNama());
        holder.mTextViewJenisKelamin.setText("Jeniskelamin = " + mMahasiswaList.get(position).getJenisKelamin());
        holder.mTextViewAlamat.setText("Alamat = " + mMahasiswaList.get(position).getAlamat());
        holder.itemView.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent mIntent = new Intent(view.getContext(), EditActivity.class);
                mIntent.putExtra("Id", mMahasiswaList.get(position).getId());
                mIntent.putExtra("Nama", mMahasiswaList.get(position).getNama());
                mIntent.putExtra("Nomor", mMahasiswaList.get(position).getJenisKelamin());
                mIntent.putExtra("Alamat", mMahasiswaList.get(position).getAlamat());
                view.getContext().startActivity(mIntent);
            }
        });
    }

    @Override
    public int getItemCount () {
        return mMahasiswaList.size();
    }

    public class MyViewHolder extends RecyclerView.ViewHolder {
        public TextView mTextViewId, mTextViewNama, mTextViewJenisKelamin,mTextViewAlamat;

        public MyViewHolder(View itemView) {
            super(itemView);
            mTextViewId = (TextView) itemView.findViewById(R.id.tvId);
            mTextViewNama = (TextView) itemView.findViewById(R.id.tvNama);
            mTextViewJenisKelamin = (TextView) itemView.findViewById(R.id.tvjeniskelamin);
            mTextViewAlamat = (TextView) itemView.findViewById(R.id.tvalamat);
        }
    }
}
