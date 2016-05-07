using UnityEngine;
using System.Collections;
using UnityEngine.UI;

public class NavigationProjectTab : MonoBehaviour {


    public Button btnAll;
    public Button btnMaps;
    public Button btnLikes;

    public GameObject panelAll;
    public GameObject panelMaps;
    public GameObject panelLikes;

    private Color activeColor = new Color(0.129F, 0.616F, 0.784F, 1F);
    private Color inactiveColor = new Color(0.4F, 0.4F, 0.4F, 1F);
    
    public void ClickAll()
    {
        
        panelAll.SetActive(true);
        panelLikes.SetActive(false);
        panelMaps.SetActive(false);
        SetClickedColor(btnAll, btnMaps, btnLikes);
    }

    public void ClickMap()
    {
        panelAll.SetActive(false);
        panelLikes.SetActive(false);
        panelMaps.SetActive(true);
        SetClickedColor(btnMaps, btnAll, btnLikes);
    }

    public void ClickLikes()
    {
        panelAll.SetActive(false);
        panelLikes.SetActive(true);
        panelMaps.SetActive(false);
        SetClickedColor(btnLikes,btnAll, btnMaps);
    }

    
    void DisableAllPanels()
    {
        panelMaps.SetActive(false);
        panelLikes.SetActive(false);
        panelAll.SetActive(false);
    }
    void SetAllInactive()
    {
        btnAll.image.color = inactiveColor;
        btnLikes.image.color = inactiveColor;
        btnLikes.image.color = inactiveColor;
    }
    void SetClickedColor(Button btnClicked, Button btn1, Button btn2)
    {
        btnClicked.image.color = activeColor;
        btn1.image.color = inactiveColor;
        btn2.image.color = inactiveColor;
    }
    void start()
    {
        SetAllInactive();
        DisableAllPanels();
    }
}



// btnMap.image.color = new Color(0.129F, 0.616F, 0.784F, 1F);