package com.example.customshirt;

import android.os.Bundle;
import android.support.annotation.NonNull;
import android.support.design.widget.BottomNavigationView;
import android.support.v4.app.Fragment;
import android.support.v4.app.FragmentTransaction;
import android.support.v7.app.AppCompatActivity;
import android.view.MenuItem;
import android.widget.FrameLayout;
import android.widget.TextView;

public class ButtonNav extends AppCompatActivity {

    private BottomNavigationView mMainNav;
    private FrameLayout mMainFrame;

    private HomeFragment homeFragment;
    private NotifFragment notifFragment;
    private KeranjangFragment keranjangFragment;
    private AkunFragment akunFragment;



    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_button_nav);

        mMainFrame = (FrameLayout) findViewById(R.id.main_frame);
        mMainNav = (BottomNavigationView) findViewById(R.id.bottom_nav);
        homeFragment = new HomeFragment();
        notifFragment = new NotifFragment();
        keranjangFragment = new KeranjangFragment();
        akunFragment = new AkunFragment();

        getSupportFragmentManager().beginTransaction()
                .replace(R.id.main_frame, new HomeFragment())
                .commit();

        mMainNav.setOnNavigationItemSelectedListener(new BottomNavigationView.OnNavigationItemSelectedListener() {
            @Override
            public boolean onNavigationItemSelected(@NonNull MenuItem item) {

                switch (item.getItemId()){

                    case  R.id.bottom_home :
                        mMainNav.setItemBackgroundResource(R.color.colorWhite);

                        setFragment(homeFragment);
                        return true;

                    case  R.id.bottom_desainku :
                        mMainNav.setItemBackgroundResource(R.color.colorWhite);
                        setFragment (keranjangFragment);
                        return true;

                    case  R.id.bottom_keranjang :
                        mMainNav.setItemBackgroundResource(R.color.colorWhite);
                        setFragment (keranjangFragment);
                        return true;

                    case  R.id.bottom_notif :
                        mMainNav.setItemBackgroundResource(R.color.colorWhite);
                        setFragment (notifFragment);
                        return true;

                    case  R.id.bottom_akun :
                        mMainNav.setItemBackgroundResource(R.color.colorWhite);
                        setFragment (akunFragment);
                        return true;

                        default:
                            return false;
                }
            }

            private void setFragment(Fragment fragment) {
                FragmentTransaction fragmentTransaction = getSupportFragmentManager().beginTransaction();
                fragmentTransaction.replace(R.id.main_frame, fragment);
                fragmentTransaction.commit();
            }


        });


//        mTextMessage = (TextView) findViewById(R.id.message);
//        BottomNavigationView navigation = (BottomNavigationView) findViewById(R.id.bottom_nav);
//        navigation.setOnNavigationItemSelectedListener(mOnNavigationItemSelectedListener);
    }

}
