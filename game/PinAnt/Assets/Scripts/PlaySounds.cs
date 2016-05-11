using UnityEngine;
using System.Collections;

public class PlaySounds : MonoBehaviour {

    public AudioClip coinSound;
    public AudioClip purchaseSound;
    public AudioClip clickSound;

    private AudioSource source { get { return GetComponent<AudioSource>(); } }

    void Start()
    {
        gameObject.AddComponent<AudioSource>();
    }
	public void playCoinSound()
    {
        source.PlayOneShot(coinSound);
    }
    public void playPurchaseSound()
    {
        source.PlayOneShot(purchaseSound);
    }

    public void playClickSound()
    {
        source.PlayOneShot(clickSound);
    }
}
