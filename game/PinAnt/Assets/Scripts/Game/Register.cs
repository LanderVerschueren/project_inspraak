using UnityEngine;
using UnityEngine.UI;
using System.Collections;

public class Register : MonoBehaviour {

    public GameObject UI;
    public GameObject Player;

    public GameObject OpenPanel;
    public GameObject ClosePanel;

    public InputField nameField;
    public InputField emailField;
    public InputField passwordField;
    public InputField repPasswordField;

    public GameObject error1;
    public GameObject error2;
    public GameObject error3;
    public GameObject error4;

    private string userName;
    private string email;
    private string password;
    private string repPassword;
    
    void Start()
    {
        UI = GameObject.Find("UILogic");
        Player = GameObject.Find("Player");
    }
    
    public void CreateNewAccount()
    {
        resetError();
        SaveInformation();
        if(ValidateInformation() == true)
        {
            PushToDataBase();

            LoadInformationToPlayer();

            UI.GetComponent<UILogic>().OpenTab(OpenPanel);
            UI.GetComponent<UILogic>().CloseTab(ClosePanel);


        }

    }



    void SaveInformation()
    {
        userName = nameField.text;
        email = emailField.text;
        password = passwordField.text;
        repPassword = repPasswordField.text;
    }
    

     bool ValidateInformation()
    {
        bool check1 = false;
        bool check2 = false;
        bool check3 = false;
        bool check4 = false;

        if (userName == "" || userName == " " || userName == "  ")
        {
            ShowError1();
        }
        else check1 = true;
        if (email.Contains("@") && email.Contains(".") || email == "")
        {
            check2 = true;
        }
        else ShowError2();

        if (password == " " || password == "")
        {
            ShowError3();
        }
        else check3 = true;

        if (password != repPassword)
        {
            ShowError4();
        }
        else check4 = true;

        if (check1 && check2 && check3 && check4)
        {
            return true;
        }
        else return false;
    }

    void PushToDataBase()
    {
        //create new profile on database;
    }

    void LoadInformationToPlayer()
    {
        Player.GetComponent<PlayerSettings>().name = userName;
        Player.GetComponent<PlayerSettings>().playerPassword = password;
    }



    void ShowError1()
    {
        error1.SetActive(true);
    }
    void ShowError2()
    {
        error2.SetActive(true);
    }
    void ShowError3()
    {
        error3.SetActive(true);
    }
    void ShowError4()
    {
        error4.SetActive(true);
    }

    void resetError()
    {
        error1.SetActive(false);
        error2.SetActive(false);
        error3.SetActive(false);
        error4.SetActive(false);
    }
}
