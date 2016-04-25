using UnityEngine;
using System.Collections;

public class OpenMenu : MonoBehaviour {

    public GameObject menu;

     public void Toggle_Menu()
    {


        Debug.Log("click");
            menu.SetActive(true);
        
    }


}
