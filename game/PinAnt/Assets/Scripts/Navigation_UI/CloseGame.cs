using UnityEngine;
using System.Collections;

public class CloseGame : MonoBehaviour {

    public GameObject quitPanel;
    public GameObject UILogic;
    void Update()
    {
        if (Input.GetKeyDown(KeyCode.Escape))
        {

            UILogic.GetComponent<UILogic>().OpenTab(quitPanel);

        }

    }

    public void CloseApplication()
    {
        Application.Quit();
    }

    public void ClosePanel()
    {
        quitPanel.SetActive(false);
    }


}
