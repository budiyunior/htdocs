package com.example.customshirt.Model;

/**
 * Created by Atiq on 12/27/2016.
 */

public class LoginResponse
{
    private String catagory;

    private String message;

    private String phone;

    private String email;

    private String name;

    private boolean login;


    public LoginResponse() {
    }

    public LoginResponse(String catagory, String message, String phone, String email, String name, boolean login) {
        this.catagory = catagory;
        this.message = message;
        this.phone = phone;
        this.email = email;
        this.name = name;
        this.login = login;
    }


    public String getCatagory() {
        return catagory;
    }

    public void setCatagory(String catagory) {
        this.catagory = catagory;
    }

    public String getMessage() {
        return message;
    }

    public void setMessage(String message) {
        this.message = message;
    }

    public String getPhone() {
        return phone;
    }

    public void setPhone(String phone) {
        this.phone = phone;
    }

    public String getEmail() {
        return email;
    }

    public void setEmail(String email) {
        this.email = email;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public boolean isLogin() {
        return login;
    }

    public void setLogin(boolean login) {
        this.login = login;
    }

    @Override
    public String toString() {
        return "LoginResponse{" +
                "catagory='" + catagory + '\'' +
                ", message='" + message + '\'' +
                ", phone='" + phone + '\'' +
                ", email='" + email + '\'' +
                ", name='" + name + '\'' +
                ", login=" + login +
                '}';
    }
}